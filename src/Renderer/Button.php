<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\IButton;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\RendererBase;

class Button extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return boolean
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IButton;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IButton $component
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		return [
			'id' => $component->getId(),
			'text' => $component->getLabel()->plain(),
			'aria-label' => $component->getTooltip()->plain(),
			'class' => 'btn-' . $component->getType()
		];
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/button/button.mustache';
	}

}