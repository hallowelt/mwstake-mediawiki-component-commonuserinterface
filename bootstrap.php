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
	'literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\Literal',
	'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IButton',
	'accordion' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IAccordion',
	'accordion-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\IAccordionItem',
];

$GLOBALS['mwsgCommonUIComponentRendererRegistry'] = [
	'*' => [
		'literal' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Literal',
		'button' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Button',
		'accordion' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\Accordion',
		'accordion-item' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Renderer\\AccordionItem',
	]
];

$GLOBALS['mwsgCommonUIComponentRendererType'] = '-';

$GLOBALS['mwsgCommonUISkinSlots'] = [
	'siteNoticeAfter' => [],
	'skinAfterContent' => []
];

$GLOBALS['mwsgCommonUISkinSlotRenderers'] = [
	'siteNoticeAfter' => [
		// phpcs:ignore
		'factory' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\GenericSkinSlotRenderer::factory'
	],
	'skinAfterContent' => [
		// phpcs:ignore
		'factory' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\GenericSkinSlotRenderer::factory'
	]
];

$GLOBALS['mwsgCommonUISkinSlotsEnabled'] = [ 'siteNoticeAfter', 'skinAfterContent' ];

$GLOBALS['wgServiceWiringFiles'][] = __DIR__ . '/includes/ServiceWiring.php';

$GLOBALS['wgHooks']['BeforePageDisplay'][]
	= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onBeforePageDisplay';
$GLOBALS['wgHooks']['SiteNoticeAfter'][]
	= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSiteNoticeAfter';
$GLOBALS['wgHooks']['SkinAfterContent'][]
	= 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Setup::onSkinAfterContent';

$GLOBALS['wgResourceModules']['mwstake.component.commonui'] = [
	'localBasePath' => __DIR__ . "/resources/",
	'packageFiles' => [
		'init.js',
		# 'commonui/renderer.js',
		[
			'name' => 'renderer.json',
			'callback' => function ( ResourceLoaderContext $context, Config $config, $callbackParams ) {
				return [
					'lorem' => 'ipsum'
				];
			}
		],
	],
];
