<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use HtmlArmor;
use MediaWiki\Html\TemplateParser;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponentRenderer;

abstract class RendererBase implements IComponentRenderer {

	/**
	 *
	 * @var string
	 */
	protected $templateBasePath = '';

	/**
	 * Shared TemplateParser instances keyed by directory path.
	 * This avoids creating a new TemplateParser (and its service lookups)
	 * on every getHtml() call, and preserves the in-memory compiled template cache.
	 *
	 * @var TemplateParser[]
	 */
	private static $templateParsers = [];

	/**
	 * Pre-resolved template directory and filename for this renderer.
	 * Computed once in getTemplateInfo() to avoid repeated dirname/basename/preg_replace.
	 *
	 * @var array|null [ 'dir' => string, 'name' => string ]
	 */
	private $templateInfo = null;

	/**
	 */
	public function __construct() {
		$this->templateBasePath = __DIR__ . '/../../resources/templates/';
	}

	/**
	 * Returns the resolved template directory and base filename (without .mustache extension).
	 *
	 * @return array [ 'dir' => string, 'name' => string ]
	 */
	private function getTemplateInfo(): array {
		if ( $this->templateInfo === null ) {
			$templatePathname = $this->getTemplatePathname();
			$dir = dirname( $templatePathname );
			$name = basename( $templatePathname );
			$name = preg_replace( '#\.mustache$#', '', $name );
			$this->templateInfo = [ 'dir' => $dir, 'name' => $name ];
		}
		return $this->templateInfo;
	}

	/**
	 * Returns a shared TemplateParser instance for the given directory.
	 *
	 * @param string $dir
	 * @return TemplateParser
	 */
	private static function getTemplateParserForDir( string $dir ): TemplateParser {
		if ( !isset( self::$templateParsers[$dir] ) ) {
			self::$templateParsers[$dir] = new TemplateParser( $dir );
		}
		return self::$templateParsers[$dir];
	}

	/**
	 * @inheritDoc
	 */
	public function getHtml( $data ): string {
		$info = $this->getTemplateInfo();
		$templateParser = self::getTemplateParserForDir( $info['dir'] );
		$data = $this->preprocessData( $data );
		$html = $templateParser->processTemplate( $info['name'], $data );
		// An empty string causes an
		//  PHP Notice: 'Array to string conversion inincludes/TemplateParser.php(173) : eval()'d'
		// and the output in the browser is 'Array'. To avoid this we replace the empty sting.
		if ( $html === '' ) {
			$html = "\0";
		}
		return $html;
	}

	/**
	 * Handle `HtmlArmor`
	 * @param array $data
	 * @return array
	 */
	protected function preprocessData( $data ) {
		$htmlArmorExcludedFieldNames = $this->getHtmlArmorExcludedFields();
		$processedData = [];
		foreach ( $data as $fieldName => $dataValue ) {
			if ( $fieldName === 'data' ) {
				// Data is already sanitized in DataAttributesBuilder, so we can skip it here
				$processedData[$fieldName] = $dataValue;
				continue;
			}
			if ( is_array( $dataValue ) ) {
				$dataValue = $this->preprocessData( $dataValue );
			} elseif ( !in_array( $fieldName, $htmlArmorExcludedFieldNames ) ) {
				if ( $dataValue !== null ) {
					$dataValue = HtmlArmor::getHtml( $dataValue );
				}
			}
			$processedData[$fieldName] = $dataValue;
		}

		return $processedData;
	}

	/**
	 * Explicitly list field names that should not be automatically handeled with `HtmlArmor`
	 * @return string[]
	 */
	protected function getHtmlArmorExcludedFields() {
		return [];
	}

	/**
	 * @inheritDoc
	 */
	public function getRLModules(): array {
		return [];
	}

	/**
	 * @inheritDoc
	 */
	public function getRLModuleStyles(): array {
		return [];
	}
}
