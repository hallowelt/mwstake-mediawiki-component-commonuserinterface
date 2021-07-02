<?php

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentDataTreeRenderer;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentRendererFactory;
use MWStake\MediaWiki\Component\CommonUserInterface\RendererDataTreeBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\SkinSlotRendererFactory;

return [
	'MWStakeCommonUISkinSlotRendererFactory' => function ( MediaWikiServices $services ) {
		return new SkinSlotRendererFactory(
			$services->getService( 'MWStakeCommonUIComponentManager' ),
			$services->getService( 'MWStakeCommonUIRendererDataTreeBuilder' ),
			$services->getService( 'MWStakeCommonUIComponentDataTreeRenderer' )
		);
	},

	'MWStakeCommonUIComponentManager' => function ( MediaWikiServices $services ) {
		$componentManager = ComponentManager::singleton(
			RequestContext::getMain(),
			$GLOBALS['mwsgCommonUISkinSlots'],
			$GLOBALS['mwsgCommonUISkinSlotsEnabled'],
			$services->getObjectFactory()
		);

		return $componentManager;
	},

	'MWStakeCommonUIComponentRendererFactory' => function ( MediaWikiServices $services ) {
		return new ComponentRendererFactory(
			$GLOBALS['mwsgCommonUIComponentRendererRegistry'],
			$GLOBALS['mwsgCommonUIComponentRegistry'],
			$GLOBALS['mwsgCommonUIComponentRendererType']
		);
	},

	'MWStakeCommonUIRendererDataTreeBuilder' => function ( MediaWikiServices $services ) {
		return new RendererDataTreeBuilder(
			$services->getService( 'MWStakeCommonUIComponentRendererFactory' )
		);
	},

	'MWStakeCommonUIComponentDataTreeRenderer' => function ( MediaWikiServices $services ) {
		return new ComponentDataTreeRenderer(
			$services->getService( 'MWStakeCommonUIComponentRendererFactory' )
		);
	},
];
