<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdown;

class Dropdown extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IDropdown;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IDropdown $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
			'btn-class' => '',
			'btn-aria-label' => $component->getAriaLabel()->text(),
			'menu-aria-desc' => $component->getAriaDesc()->text(),
			'body' => $subComponentNodes,
		];
		if ( $component instanceof IDropdown ) {
			$templateData['class'] = implode( ' ', $component->getContainerClasses() );
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/dropdown.mustache';
	}
}
