<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardImage;

class CardImage extends RendererBase {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-img.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
				'id' => $component->getId(),
		];

		/** @var IComponent $component */
		if ( $component instanceof ICardImage ) {
			$templateData = array_merge(
				$templateData,
				[
					'type' => $component->getImageType(),
					'src' => $component->getImageSrc(),
					'alt' => $component->getImageAltText()->text()
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
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

}
