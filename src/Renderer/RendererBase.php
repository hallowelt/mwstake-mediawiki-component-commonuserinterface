<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\IComponentRenderer;
use TemplateParser;

abstract class RendererBase implements IComponentRenderer {

	/**
	 *
	 * @var string
	 */
	protected $templateBasePath = '';

	/**
	 *
	 * @var TemplateParser
	 */
	private $templateParser = null;

	/**
	 */
	public function __construct() {
		$this->templateBasePath = __DIR__ . '/../../resources/templates/';
	}

	/**
	 * @inheritDoc
	 */
	public function getHtml( $data ) : string {
		$templatePathname = $this->getTemplatePathname();
		$templateDirname = dirname( $templatePathname );
		$templateFilename = basename( $templatePathname );
		// TODO: Maybe add a "getTemplateFileExtension" method to the interface?
		$templateFilename = preg_replace( '#\.mustache$#', '', $templateFilename );
		$this->templateParser = new TemplateParser( $templateDirname );
		return $this->templateParser->processTemplate( $templateFilename, $data );
	}

	/**
	 * @inheritDoc
	 */
	public function getRLModules() : array {
		return [];
	}

	/**
	 * @inheritDoc
	 */
	public function getRLModuleStyles() : array {
		return [];
	}
}
