<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IRenderer;
use TemplateParser;

abstract class RendererBase implements IRenderer {

	/**
	 *
	 * @var string
	 */
	protected $templateBasePath = '';

	/**
	 *
	 */
	public function __construct() {
		$this->templateBasePath = __DIR__ . '/../../resources/templates';
	}

	/**
	 *
	 * @var TemplateParser
	 */
	private $templateParser = null;

	/**
	 *
	 * @param IComponent $component
	 * @return string
	 */
	public function render( IComponent $component ) : string {
		$templatePathname = $this->getTemplatePathname();
		$templateDirname = dirname( $templatePathname );
		$templateFilename = basename( $templatePathname );
		$templateData = $this->getTemplateData( $component );

		$this->templateParser = new TemplateParser( $templateDirname );
		return $this->templateParser->processTemplate( $templateFilename, $templateData );
	}

	/**
	 *
	 * @return array
	 */
	public function getRLModules() : array {
		return [];
	}

	/**
	 *
	 * @return array
	 */
	public function getRLModuleStyles() : array {
		return [];
	}
}