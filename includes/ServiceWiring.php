<?php

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentDataTreeRenderer;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentRendererFactory;
use MWStake\MediaWiki\Component\CommonUserInterface\GenericComponentRenderer;
use MWStake\MediaWiki\Component\CommonUserInterface\HtmlIdRegistry;
use MWStake\MediaWiki\Component\CommonUserInterface\RendererDataTreeBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\SkinSlotRendererFactory;

return [
	'MWStakeCommonUISkinSlotRendererFactory' => function ( MediaWikiServices $services ) {
		return new SkinSlotRendererFactory(
			$GLOBALS['mwsgCommonUISkinSlotRenderers'],
			$services->getObjectFactory()
		);
	},

	'MWStakeCommonUIComponentManager' => function ( MediaWikiServices $services ) {
		$componentManager = ComponentManager::singleton(
			RequestContext::getMain(),
			$GLOBALS['mwsgCommonUISkinSlots'],
			$GLOBALS['mwsgCommonUISkinSlotsEnabled'],
			$services->getObjectFactory(),
			$services->getHookContainer()
		);

		return $componentManager;
	},

	'MWStakeCommonUIComponentRendererFactory' => function ( MediaWikiServices $services ) {
		return new ComponentRendererFactory(
			$GLOBALS['mwsgCommonUIComponentRendererRegistry'],
			$GLOBALS['mwsgCommonUIComponentRegistry'],
			$GLOBALS['mwsgCommonUIComponentRendererType'],
			$services->getObjectFactory()
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

	'MWStakeCommonUIHtmlIdRegistry' => function ( MediaWikiServices $services ) {
		$registry = HtmlIdRegistry::singleton();
		return $registry;
	},

	'MWStakeCommonUIGenericComponentRenderer' => function ( MediaWikiServices $services ) {
		$renderer = new GenericComponentRenderer(
			$services->get( 'MWStakeCommonUIComponentManager' ),
			$services->get( 'MWStakeCommonUIRendererDataTreeBuilder' ),
			$services->get( 'MWStakeCommonUIComponentDataTreeRenderer' )
		);
		return $renderer;
	},
];
