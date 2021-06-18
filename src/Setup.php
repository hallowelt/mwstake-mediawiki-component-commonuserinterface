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

		//Would e.g. come from `ComponentManger::getSkinSlotComponentTree`
		$componentTree = [
			'my-panel' => [
				'component' => new \MWStake\MediaWiki\Component\CommonUserInterface\Component\SimplePanel( [ 'id' => 'XYZ' ] ),
				'subComponents' => [
					'my-literal' => [
						'component' => new \MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal', 'This is a test of component \'literal\'' ),
						'subComponents' => []
					],
					'my-button' => [
						'component' => new \MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleButton( [] ),
						'subComponents' => []
					]
				]
			]
		];

		/** @var RendererDataTreeBuilder */
		$rendererDataTreeBuilder = \MediaWiki\MediaWikiServices::getInstance()->getService( 'MWStakeCommonUIRendererDataTreeBuilder' );
		$rendererDataTree = $rendererDataTreeBuilder->getRendererDataTree( $componentTree );

		$siteNotice .= var_export( $rendererDataTree, 1 );
		return;

		/** @var ComponentDataTreeRenderer */
		$componentDataRenderer = \MediaWiki\MediaWikiServices::getInstance()->getService( 'MWStakeCommonUIComponentDataTreeRenderer' );
		$siteNotice .= $componentDataRenderer->getHtml( $rendererDataTree );

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

		// TODO:
		// #4: Use renderer to make HTML for each "slot" (also make sure clientside renderers are available using a RL module)
		// #5: In Skin, pass "slots" HTML into the (mustache-)template

		$out->addModules( 'mwstake.component.commonui' );
		return true;
	}
}
