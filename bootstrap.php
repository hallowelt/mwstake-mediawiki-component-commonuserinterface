<?php

if ( !defined( 'MEDIAWIKI' ) && !defined( 'MW_PHPUNIT_TEST' ) ) {
	return;
}

if ( defined( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION' ) ) {
	return;
}

define( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION', '3.0.9' );

MWStake\MediaWiki\ComponentLoader\Bootstrapper::getInstance()
->register( 'commonuserinterface', function () {
	$lessVars = \MWStake\MediaWiki\Component\CommonUserInterface\LessVars::getInstance();

	// Provide the list of values
	$lessVars->setVar( 'primary-bg', '' );
	$lessVars->setVar( 'secondary-bg', '' );
	$lessVars->setVar( 'tertiary-bg', '' );
	$lessVars->setVar( 'quaternary-bg', '' );
	$lessVars->setVar( 'primary-fg', '' );
	$lessVars->setVar( 'secondary-fg', '' );
	$lessVars->setVar( 'tertiary-fg', '' );
	$lessVars->setVar( 'quaternary-fg', '' );
	$lessVars->setVar( 'body-bg', '' );

	$lessVars->setVar( 'navbar-bg', '' );
	$lessVars->setVar( 'navbar-fg', '' );
	$lessVars->setVar( 'navbar-highlight', '' );

	$lessVars->setVar( 'sidebar-bg', '' );
	$lessVars->setVar( 'sidebar-fg', '' );
	$lessVars->setVar( 'sidebar-highlight', '' );

	$lessVars->setVar( 'footer-bg', '' );
	$lessVars->setVar( 'footer-fg', '' );

	$lessVars->setVar( 'content-bg', '' );
	$lessVars->setVar( 'content-fg', '' );
	$lessVars->setVar( 'content-width', '' );
	$lessVars->setVar( 'link-fg', '' );
	$lessVars->setVar( 'new-link-fg', '' );
	$lessVars->setVar( 'content-font-size', '' );
	$lessVars->setVar( 'content-font-weight', '' );
	$lessVars->setVar( 'content-primary-font-family', '' );

	$lessVars->setVar( 'content-font-family', '' );

	$lessVars->setVar( 'content-h1-fg', '' );
	$lessVars->setVar( 'content-h1-font-size', '' );
	$lessVars->setVar( 'content-h1-font-weight', '' );
	$lessVars->setVar( 'content-h1-border', '' );

	$lessVars->setVar( 'content-h2-fg', '' );
	$lessVars->setVar( 'content-h2-font-size', '' );
	$lessVars->setVar( 'content-h2-font-weight', '' );
	$lessVars->setVar( 'content-h2-border', '' );

	$lessVars->setVar( 'content-h3-fg', '' );
	$lessVars->setVar( 'content-h3-font-size', '' );
	$lessVars->setVar( 'content-h3-font-weight', '' );
	$lessVars->setVar( 'content-h3-border', '' );

	$lessVars->setVar( 'content-h4-fg', '' );
	$lessVars->setVar( 'content-h4-font-size', '' );
	$lessVars->setVar( 'content-h4-font-weight', '' );
	$lessVars->setVar( 'content-h4-border', '' );

	$lessVars->setVar( 'content-h5-fg', '' );
	$lessVars->setVar( 'content-h5-font-size', '' );
	$lessVars->setVar( 'content-h5-font-weight', '' );
	$lessVars->setVar( 'content-h5-border', '' );

	$lessVars->setVar( 'content-h6-fg', '' );
	$lessVars->setVar( 'content-h6-font-size', '' );
	$lessVars->setVar( 'content-h6-font-weight', '' );
	$lessVars->setVar( 'content-h6-border', '' );

	/**
	 * Allows to register additional component interfaces
	 */
	$GLOBALS['mwsgCommonUIComponentRegistry'] = [
		// phpcs:disable
		'literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ILiteral',
		'message-literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IMessageLiteral',
		'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IButton',
		'panel' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IPanel',
		'dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdown',
		'dropdown-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownButton',
		'dropdown-icon' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownIcon',
		'dropdown-icon-split-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownIconSplitButton',
		'dropdown-split-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownSplitButton',
		'dropdown-split-link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownSplitLink',
		'dropdown-itemlist' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownItemlist',
		'dropdown-itemlist-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownItemlistItem',
		'dropdown-itemlist-from-array' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IDropdownItemlistFromArray',
		'separator' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ISeparator',
		'card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICard',
		'card-header' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardHeader',
		'card-title' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardTitle',
		'card-subtitle' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardSubTitle',
		'card-body' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardBody',
		'card-text' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardText',
		'card-footer' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardFooter',
		'card-image' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardImage',
		'card-link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICardLink',
		'collapsible-card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ICollapsibleCard',
		'linklistgroup' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ILinklistGroup',
		'linklistgroup-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ILinklistGroupItem',
		'linklistgroup-from-array' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ILinklistGroupFromArray',
		'link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ILink',
		'text-link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ITextLink',
		'badge' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IBadge',
		'button-group' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IButtonGroup',
		'media-object' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IMediaObject',
		// phpcs:enable
	];

	/**
	 * Allows to register `IComponentRenderer` objects using any `ObjectFactory` compatible spec.
	 * If the value is just a string a `ObjectFactory` with the `class` key will be created implicitly.
	 */
	$GLOBALS['mwsgCommonUIComponentRendererRegistry'] = [
		'*' => [
			// phpcs:disable
			'literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Literal',
			'message-literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\MessageLiteral',
			// phpcs:enable
		],
		'bootstrap5' => [
			// phpcs:disable
			'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Button',
			'panel' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Card',
			'dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Dropdown',
			'dropdown-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownButton',
			'dropdown-icon' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownIcon',
			'dropdown-icon-split-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownIconSplitButton',
			'dropdown-split-button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownSplitButton',
			'dropdown-split-link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownSplitLink',
			'dropdown-itemlist' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownItemlist',
			'dropdown-itemlist-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownItemlistItem',
			'dropdown-itemlist-from-array' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\DropdownItemlistFromArray',
			'separator' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Separator',
			'card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Card',
			'card-header' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardHeader',
			'card-title' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardTitle',
			'card-subtitle' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardSubTitle',
			'card-body' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardBody',
			'card-text' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardText',
			'card-footer' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardFooter',
			'card-image' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardImage',
			'card-link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CardLink',
			'collapsible-card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\CollapsibleCard',
			'linklistgroup' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\LinklistGroup',
			'linklistgroup-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\LinklistGroupItem',
			'linklistgroup-from-array' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\LinklistGroupFromArray',
			'link' => [
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Link',
				'services' => [ 'MainConfig' ]
			],
			'text-link' =>  [
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\TextLink',
				'services' => [ 'MainConfig' ]
			],
			'badge' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Badge',
			'button-group' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\ButtonGroup',
			'media-object' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\MediaObject',
			// phpcs:enable
		]
	];

	$GLOBALS['mwsgCommonUIComponentRendererType'] = 'bootstrap5';

	$GLOBALS['mwsgCommonUISkinSlots'] = [
		'siteNoticeAfter' => [],
		'skinAfterContent' => []
	];

	/**
	 * Allows to register `ISkinSlotRenderer` objects using any `ObjectFactory` compatible spec
	 */
	$GLOBALS['mwsgCommonUISkinSlotRenderers'] = [
		// Use internal fallback to GenericSkinSlotRenderer by giving empty spec array
		'siteNoticeAfter' => [],
		'skinAfterContent' => [],
	];

	$GLOBALS['mwsgCommonUISkinSlotsEnabled'] = [ 'siteNoticeAfter', 'skinAfterContent' ];

	$GLOBALS['wgServiceWiringFiles'][] = __DIR__ . '/includes/ServiceWiring.php';

	$GLOBALS['wgHooks']['BeforePageDisplay'][]
		= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onBeforePageDisplay';
	$GLOBALS['wgHooks']['SiteNoticeAfter'][]
		= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSiteNoticeAfter';
	$GLOBALS['wgHooks']['SkinAfterContent'][]
		= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSkinAfterContent';

	// phpcs:disable
	// Not yet ready
	#$GLOBALS['wgResourceModules']['mwstake.component.commonui'] = [
	#	'localBasePath' => __DIR__ . "/resources/",
	#	'packageFiles' => [
	#		'init.js',
	#		# 'commonui/renderer.js',
	#		[
	#			'name' => 'renderer.json',
	#			// phpcs:ignore
	#			'callback' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::makeClientSideRendererConfig'
	#		],
	#	],
	#];
	#$GLOBALS['wgResourceModules']['mwstake.component.commonui.componentrenderer'] = [
		// phpcs:ignore
	#	'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\ResourceLoader\\ComponentRenderer'
	#];

	#$GLOBALS['wgMessagesDirs']['mwstake-component-commonui'] = __DIR__ . '/i18n';

	#$GLOBALS['wgAPIModules']['mwstake-commonui-skinslot']
	#	= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Api\\SkinSlot';
	// phpcs:enable
} );
