<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Api;

use ApiBase;
use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\RendererDataTreeBuilder;

class SkinSlot extends ApiBase {
	public function execute() {
		$slotId = $this->getParameter( 'slot' );

		$services = MediaWikiServices::getInstance();

		/** @var ComponentManager */
		$componentManager = $services->getService( 'MWStakeCommonUIComponentManager' );

		/** @var RendererDataTreeBuilder */
		$rendererDataTreeBuilder = $services->getService( 'MWStakeCommonUIRendererDataTreeBuilder' );

		$componentTree = $componentManager->getSkinSlotComponentTree( $slotId );
		$rendererDataTree = $rendererDataTreeBuilder->getRendererDataTree( $componentTree );

		$result = $this->getResult();
		$result->addArrayType( 'tree', '', $rendererDataTree );
	}
}
