<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\MediaWikiServices;
use OutputPage;
use Skin;

class Setup {

	/**
	 *
	 * @param string $data
	 * @param Skin $skin
	 * @return bool
	 */
	public static function onSkinAfterContent( &$data, Skin $skin ) {
		$services = MediaWikiServices::getInstance();
		$skinSlotRendererFactory = $services->getService( 'MWStakeCommonUISkinSlotRendererFactory' );
		$skinSlotRenderer = $skinSlotRendererFactory->create( 'skinAfterContent' );
		$data .= $skinSlotRenderer->getHtml();
		return true;
	}

	/**
	 *
	 * @param string $siteNotice
	 * @param Skin $skin
	 * @return bool
	 */
	public static function onSiteNoticeAfter( &$siteNotice, $skin ) {
		$services = MediaWikiServices::getInstance();
		$skinSlotRendererFactory = $services->getService( 'MWStakeCommonUISkinSlotRendererFactory' );
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
		$componentManager->init();

		$out->addModules( $componentManager->getRLModules() );
		$out->addModuleStyles( $componentManager->getRLModuleStyles() );

		//TODO:
		// #1: build up the component tree from "slots" (slots may define allowed components types, e.g. only ICards, ILinks)
		// #2: walk the tree and ask whether or not to render
		// #3: Ask for RL modules to load
		// #4: Use renderer to make HTML for each "slot" (also make sure clientside renderers are available using a RL module)
		// #5: In Skin, pass "slots" HTML into the (mustache-)template
		return true;
	}
}