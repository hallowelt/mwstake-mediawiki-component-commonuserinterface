<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
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
	 * @inheritDoc
	 */
	public function getHtml( $data ) : string {
		$templatePathname = $this->getTemplatePathname();
		$templateDirname = dirname( $templatePathname );
		$templateFilename = basename( $templatePathname );

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
	public function getRLModuleStyles(): array {
		return [];
	}
}