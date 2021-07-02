<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\MediaWikiServices;
use OutputPage;
use Skin;

class Setup {

	/**
	 *
	 * @param string &$data
	 * @param Skin $skin
	 * @return bool
	 */
	public static function onSkinAfterContent( &$data, Skin $skin ) {
		$services = MediaWikiServices::getInstance();
		/** @var SkinSlotRendererFactory */
		$skinSlotRendererFactory = $services->getService( 'MWStakeCommonUISkinSlotRendererFactory' );
		/** @var GenericSkinSlotRenderer */
		$skinSlotRenderer = $skinSlotRendererFactory->create( 'skinAfterContent' );
		$data .= $skinSlotRenderer->getHtml();

		return true;
	}

	/**
	 *
	 * @param string &$siteNotice
	 * @param Skin $skin
	 * @return bool
	 */
	public static function onSiteNoticeAfter( &$siteNotice, $skin ) {
		$services = MediaWikiServices::getInstance();
		/** @var SkinSlotRendererFactory */
		$skinSlotRendererFactory = $services->getService( 'MWStakeCommonUISkinSlotRendererFactory' );
		/** @var GenericSkinSlotRenderer */
		$skinSlotRenderer = $skinSlotRendererFactory->create( 'siteNoticeAfter' );
		$siteNotice .= $skinSlotRenderer->getHtml();

		return true;
	}

	/**
	 *
	 * @param OutputPage $out
	 * @param Skin $skin
	 * @return bool
	 */
	public static function onBeforePageDisplay( OutputPage $out, Skin $skin ) {
		$services = MediaWikiServices::getInstance();
		/** @var ComponentManager */
		$componentManager = $services->getService( 'MWStakeCommonUIComponentManager' );

		$out->addModules( $componentManager->getRLModules() );
		$out->addModuleStyles( $componentManager->getRLModuleStyles() );

		$out->addModules( 'mwstake.component.commonui' );
		return true;
	}
}
