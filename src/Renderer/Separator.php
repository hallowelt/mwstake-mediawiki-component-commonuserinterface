<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\Separator as SeparatorComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class Separator extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof SeparatorComponent;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param SeparatorComponent $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$data = [];
		if ( $component->getClass() !== '' ) {
			$data = [
				'class' => $component->getClass()
			];
		}

		return $data;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/separator.mustache';
	}
}
