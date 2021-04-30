<?php

if ( defined( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION' ) ) {
	return;
}

define( 'MWSTAKE_MEDIAWIKI_COMPONENT_COMMONUSERINTERFACE_VERSION', '2.0.0' );

wfLoadExtension( '', __DIR__ . '/extension.json' );

$GLOBALS['wgExtensionFunctions'][] = function() {
	if ( ( $GLOBALS['mwsEnableMediaWikiUITheme'] === true ) || ( $GLOBALS['mwsEnableMediaWikiUITheme'] === 1 ) ) {
		$mwui = \MWStake\MediaWiki\Component\CommonUserInterface\MediaWikiUI::getInstance();
		$mwui->enableMediWikiUITheme();
	}
};

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
