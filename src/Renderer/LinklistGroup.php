<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ILinklistGroup;

class LinklistGroup extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ILinklistGroup;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILinklistGroup $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		/** @var IComponent $component */
		if ( $component instanceof ILinklistGroup ) {
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
				$formatter = new Formatter();
				$templateData['links'] = $formatter->formatLinks( $component->getLinks() );
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
		return $this->templateBasePath . '/linklist-group.mustache';
	}
}
