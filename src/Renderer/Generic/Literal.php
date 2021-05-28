<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Generic;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal as LiteralComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\RendererBase;

class Literal extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return boolean
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof LiteralComponent;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param LiteralComponent $component
	 * @return array
	 */
	public function getTemplateData( IComponent $component ) : array {
		return [
			'id' => $component->getId(),
			'text' => $component->getHtml()
		];
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/literal.mustache';
	}

}