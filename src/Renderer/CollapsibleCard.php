<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\ICollapsibleCard;

class CollapsibleCard extends RendererBase {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
			'text' => $component->getText()->text(),
			'title' => $component->getTitle()->text(),
			'aria-label' => $component->getAriaLabel()->text(),
			'body' => $subComponentNodes,
		];

		/** @var IComponent $component */
		if ( $component instanceof ICollapsibleCard ) {
			if ( !empty( $component->getContainerClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'cnt-class' => implode( ' ', $component->getContainerClasses() )
					]
				);
			}
			if ( !empty( $component->getHeaderClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'header-class' => implode( ' ', $component->getHeaderClasses() )
					]
				);
			}
			if ( !empty( $component->getBodyClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'body-class' => implode( ' ', $component->getBodyClasses() )
					]
				);
			}
			if ( $component->getExpandedState() ) {
				$templateData = array_merge(
					$templateData,
					[
						'expanded' => 'true'
					]
				);
			} else {
				$templateData = array_merge(
					$templateData,
					[
						'expanded' => 'false'
					]
				);
			}

		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

}