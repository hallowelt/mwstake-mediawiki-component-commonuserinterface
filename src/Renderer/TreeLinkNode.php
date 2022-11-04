<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\AriaAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeLinkNode;

class TreeLinkNode extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ITreeLinkNode;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILink $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ): array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ITreeLinkNode ) {
			$id = $component->getId();
			$templateData = [
				'id' => $id,
				'classes' => $component->getClasses(),
				'role' => $component->getRole(),
				'text' => $component->getText()->text(),
				'title' => $component->getTitle()->text(),
				'href' => $component->getHref(),
				'labelId' => "$id-label"
			];

			if ( !empty( $subComponentNodes ) ) {
				$templateData['hasChildren'] = 'true';
				$templateData['children'] = $subComponentNodes;
			}

			$aria = $component->getAriaAttributes();
			$ariaAttributesBuilder = new AriaAttributesBuilder();
			$ariaAttributes = $ariaAttributesBuilder->toString( $aria );
			$templateData = array_merge(
				$templateData,
				[
					'aria' => $ariaAttributes
				]
			);

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
		return $this->templateBasePath . '/tree-link-node.mustache';
	}
}
