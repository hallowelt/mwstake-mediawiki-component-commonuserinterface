<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IPanel;

class Card extends RendererBase {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . '/card/card.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
			'class' => '',
			'content' => $subComponentNodes,
		];
		if ( $component instanceof IPanel ) {
			$templateData['class'] = $component->getContainerClasses();
		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

}
