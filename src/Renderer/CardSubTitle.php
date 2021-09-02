<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardSubTitle;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class CardSubTitle extends RendererBase {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-subtitle.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ICardSubTitle ) {
			if ( !empty( $subComponentNodes ) ) {
				$templateData['body'] = $subComponentNodes;
			}
			if ( !empty( $component->getClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'class' => implode( ' ', $component->getClasses() )
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
