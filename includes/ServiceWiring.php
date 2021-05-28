<?php

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\RendererFactory;
use MWStake\MediaWiki\Component\CommonUserInterface\SkinSlotRendererFactory;

return [
	'MWStakeCommonUISkinSlotRendererFactory' => function ( MediaWikiServices $services ) {
		return new SkinSlotRendererFactory();
	},

	'MWStakeCommonUIComponentManager' => function ( MediaWikiServices $services ) {
		return new ComponentManager();
	},

	'MWStakeCommonUIComponentRendererFactory' => function ( MediaWikiServices $services ) {
		return new RendererFactory();
	},
];
