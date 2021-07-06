<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ILiteral;

class Literal extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ILiteral;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILiteral $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		/** @var IComponent $component */
		if ( $component instanceof ILiteral ) {
			$data = [
				'id' => $component->getId(),
				'text' => $component->getHtml()
			];
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

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
