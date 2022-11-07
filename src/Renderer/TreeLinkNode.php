<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\AriaAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeLinkNode;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode;

class TreeLinkNode extends TreeTextNode {

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
	 * @param IComponent $component
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
				'role' => $component->getRole(),
				'text' => $component->getText()->text(),
				'title' => $component->getTitle()->text(),
				'href' => $component->getHref(),
				'labelId' => "$id-label",
			];

			$this->getClasses( $component, $templateData );
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
		return $this->templateBasePath . '/tree-link-node.mustache';
	}

}
