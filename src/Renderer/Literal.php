<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal as LiteralComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class Literal extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
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
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$data = [
			'id' => $component->getId(),
			'text' => $component->getHtml()
		];

		return $data;
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
