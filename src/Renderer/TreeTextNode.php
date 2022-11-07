<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\AriaAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeTextNode;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode;

class TreeTextNode extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ITreeTextNode;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IComponent $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ): array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ITreeTextNode ) {
			$id = $component->getId();

			$templateData = [
				'id' => $id,
				'classes' => $component->getClasses(),
				'role' => $component->getRole(),
				'text' => $component->getText()->text(),
				'labelId' => "$id-label",
			];

			$this->getChildren( $component, $subComponentNodes, $templateData );
			$this->getAriaAttributes( $component, $templateData );
			$this->getIcons( $component, $templateData );

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
	public function getTemplatePathname() : string {
		return $this->templateBasePath . '/tree-text-node.mustache';
	}

	/**
	 * @param ITreeNode $component
	 * @retrun array
	 */
	protected function getExpandButtonParams( ITreeNode $component ): array {
		$button = [
			'expanded' => 'false',
			'classes' => $component->getIconExpandClasses()
		];

		if ( $component->isExpanded() ) {
			$button['expanded'] = 'true';
			$button['classes'] = $component->getIconCollapseClasses();
		}

		return $button;
	}

	/**
	 * @param IComponent $component
	 * @param array $subComponentNodes
	 * @param array &$templateData
	 * return void
	 */
	protected function getChildren( IComponent $component, array $subComponentNodes, array &$templateData ): void {
		if ( !empty( $subComponentNodes ) ) {
			$templateData['hasChildren'] = 'true';
			$templateData['children'] = $subComponentNodes;
			$templateData['expandBtn'] = $this->getExpandButtonParams( $component );

			$templateData['classes'] = 'false';
			if ( $component->isExpanded() ) {
				$templateData['expanded'] = 'true';
				$templateData['classes'] = 'expanded';
			}
		} else {
			$templateData['classes'][] = 'leaf';
		}
	}

	/**
	 * @param IComponent $component
	 * @param array &$templateData
	 * @retrun void
	 */
	protected function getAriaAttributes( IComponent $component, array &$templateData ): void {
		$aria = $component->getAriaAttributes();
		$ariaAttributesBuilder = new AriaAttributesBuilder();
		$ariaAttributes = $ariaAttributesBuilder->toString( $aria );
		$templateData = array_merge(
			$templateData,
			[
				'aria' => $ariaAttributes
			]
		);
	}

		/**
	 * @param IComponent $component
	 * @param array &$templateData
	 * @retrun void
	 */
	protected function getIcons( IComponent $component, array &$templateData ): void {
		$iconBeforeClasses = $component->getIconBeforeClasses();
		$iconAfterClasses = $component->getIconAfterClasses();

		if ( !empty( $iconBeforeClasses ) ) {
			$templateData = array_merge(
				$templateData,
				[
					'iconBefore' => [
						'classes' => implode( ' ', $iconBeforeClasses )
					]
				]
			);
		}

		if ( !empty( $iconAfterClasses ) ) {
			$templateData = array_merge(
				$templateData,
				[
					'iconAfter' =>  [
						'classes' => implode( ' ', $iconAfterClasses )
					]
				]
			);
		}
	}
}
