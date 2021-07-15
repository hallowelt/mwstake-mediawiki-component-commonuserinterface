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
			'btn-text' => $component->getButtonText()->text(),
			'btn-title' => $component->getButtonTitle()->text(),
			'split-btn-title' => $component->getSplitButtonTitle()->text(),
			'btn-group-aria-label' => $component->getButtonGroupAriaLabel()->text(),
			'btn-aria-label' => $component->getButtonAriaLabel()->text(),
			'split-btn-aria-label' => $component->getSplitButtonAriaLabel()->text(),
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
			if ( !empty( $component->getButtonClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'btn-class' => implode( ' ', $component->getButtonClasses() )
					]
				);
			}
			if ( !empty( $component->getSplitButtonClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'split-btn-class' => implode( ' ', $component->getSplitButtonClasses() )
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
			if ( $component->buttonIsDisabled() ) {
				$class = $templateData['btn-class'];
				$templateData = array_merge(
					$templateData,
					[
						'btn-class' => $class . ' disabled'
					]
				);
			}
			if ( $component->splitButtonIsDisabled() ) {
				$class = $templateData['split-btn-class'];
				$templateData = array_merge(
					$templateData,
					[
						'split-btn-class' => $class . ' disabled'
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
