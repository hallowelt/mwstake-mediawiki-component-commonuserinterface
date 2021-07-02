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
	 * @param LiteralComponent $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'btn' => [
				'id' => $component->getId(),
				'class' => '',
				'aria-label' => $component->getAriaLabel(),
			],
			'menu' => [
				'id' => $component->getId(),
				'aria-desc' => $component->getAriaDesc(),
				'content' => $subComponentNodes,
			]
		];
		if ( $component instanceof IDropdown ) {
			$templateData['class'] = implode( ' ', $component->getContainerClasses() );
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		// TODO: make subcomponents work

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
