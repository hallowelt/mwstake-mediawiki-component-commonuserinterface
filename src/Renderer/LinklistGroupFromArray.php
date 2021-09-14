<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ILinklistGroupFromArray;

class LinklistGroupFromArray extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ILinklistGroupFromArray;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILinklistGroup $component
	 * @param array $subComponentNodes
	 * @param array $data
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ILinklistGroupFromArray ) {
			$templateData = [
				'cnt-id' => $component->getId()
			];

			if ( !empty( $component->getContainerClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'cnt-class' => implode( ' ', $component->getContainerClasses() )
					]
				);
			}
			if ( !empty( $component->getLinks() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'links' => $component->getLinks()
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
	public function getTemplatePathname() : string {
		return $this->templateBasePath . '/linklist-group-from-array.mustache';
	}
}
