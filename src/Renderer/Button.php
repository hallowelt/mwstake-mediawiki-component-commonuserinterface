<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IButton;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class Button extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IButton;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IButton $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
		];

		/** @var IComponent $component */
		if ( $component instanceof IButton ) {
			$templateData = array_merge(
				$templateData,
				[
					'text' => $component->getText()->text(),
					'aria-label' => $component->getAriaLabel()
				]
			);
			if ( !empty( $component->getClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'class' => implode( ' ', $component->getClasses() )
					]
				);
			}
			if ( $component->isDisabled() ) {
				$class = $templateData['class'];
				$templateData = array_merge(
					$templateData,
					[
						'class' => $class . ' disabled'
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
		return $this->templateBasePath . '/button.mustache';
	}

}
