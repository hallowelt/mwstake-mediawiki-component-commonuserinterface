<?php

if ( !defined( 'MEDIAWIKI' ) && !defined( 'MW_PHPUNIT_TEST' ) ) {
	return;
}

if ( defined( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION' ) ) {
	return;
}

define( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION', '2.0.0' );

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

$GLOBALS['mwsgCommonUIComponentRegistry'] = [
	'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\IButton',
	'toolbar' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\IToolbar',
	'card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\ICard',
	'link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\ILink',
	'linklist' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\ILinklist',
	'icon-dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\IIconDropDown',
	'button-dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\IButtonDropDown',
	'media-element' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\IMediaElement',
];

$GLOBALS['mwsgCommonUIComponentRendererRegistry'] = [
	'*' => [
		'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\IButton',
		'toolbar' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\IToolbar',
		'card' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\ICard',
		'link' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\ILink',
		'linklist' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\ILinklist',
		'icon-dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\IIconDropDown',
		'button-dropdown' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\IButtonDropDown',
		'media-element' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\IMediaElement',
	]
];

$GLOBALS['mwsgCommonUISkinSlots'] = [
	'siteNoticeAfter' => [],
	'skinAfterContent' => []
];

$GLOBALS['mwsgCommonUISkinSlotRenderers'] = [
	'siteNoticeAfter' => [
		'factory' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\SkinSlotRenderer\\SiteNoticeAfter::factory'
	],
	'skinAfterContent' => [
		'factory' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\SkinSlotRenderer\\SkinAfterContent::factory'
	]
];

$GLOBALS['mwsgCommonUISkinSlotsEnabled'] = [ 'siteNoticeAfter', 'dataAfterContent' ];

$GLOBALS['wgServiceWiringFiles'][] = __DIR__ . '/includes/ServiceWiring.php';

$GLOBALS['wgHooks']['BeforePageDisplay'][] = 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onBeforePageDisplay';
$GLOBALS['wgHooks']['SiteNoticeAfter'][] = 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSiteNoticeAfter';
$GLOBALS['wgHooks']['SkinAfterContent'][] = 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSkinAfterContent';
