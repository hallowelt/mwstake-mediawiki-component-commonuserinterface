<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardText;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class CardText extends RendererBase {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-text.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'body' => $subComponentNodes,
		];

		/** @var IComponent $component */
		if ( $component instanceof ICardText ) {
			if ( !empty( $component->getContainerClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'class' => implode( ' ', $component->getContainerClasses() )
					]
				);
			}
			if ( $component->getId() !== '' ) {
				$templateData = array_merge(
					$templateData,
					[
						'id' => $component->getId()
					]
				);
			}
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}
}
