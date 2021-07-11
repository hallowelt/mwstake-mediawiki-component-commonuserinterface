<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownSplitButton;

class DropdownSplitButton extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IDropdownSplitButton;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IDropdownSplitButton $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
			'main-btn-text' => $component->getMainButtonText()->text(),
			'main-btn-title' => $component->getMainButtonTitle()->text(),
			'menu-btn-title' => $component->getMenuButtonTitle()->text(),
			'btn-group-aria-label' => $component->getButtonGroupAriaLabel()->text(),
			'main-btn-aria-label' => $component->getMainButtonAriaLabel()->text(),
			'menu-btn-aria-label' => $component->getMenuButtonAriaLabel()->text(),
			'btn-group-role' => $component->getButtonGroupRole(),
			'body' => $subComponentNodes,
		];
		if ( $component instanceof IDropdownSplitButton ) {
			if ( !empty( $component->getContainerClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'cnt-class' => implode( ' ', $component->getContainerClasses() )
					]
				);
			}
			if ( !empty( $component->getMainButtonClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'main-btn-class' => implode( ' ', $component->getMainButtonClasses() )
					]
				);
			}
			if ( !empty( $component->getMenuButtonClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'main-btn-class' => implode( ' ', $component->getMenuButtonClasses() )
					]
				);
			}
			if ( !empty( $component->getMenuClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'menu-class' => implode( ' ', $component->getMenuClasses() )
					]
				);
			}
			if ( !empty( $component->getButtonGroupClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'btn-group-class' => implode( ' ', $component->getButtonGroupClasses() )
					]
				);
			}
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
		return $this->templateBasePath . '/dropdown-split-button.mustache';
	}
}
