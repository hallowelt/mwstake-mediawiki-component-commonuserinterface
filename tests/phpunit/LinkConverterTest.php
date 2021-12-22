<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use MWStake\MediaWiki\Component\CommonUserInterface\LinkConverter;
use PHPUnit\Framework\TestCase;
use RawMessage;

class LinkConverterTest extends TestCase {

	/**
	 * @param array $linkDescs
	 * @covers LinkConverter::getLinksFromArrayDescriptor
	 * @dataProvider provideGetLinksFromArrayDescriptorTestData
	 * @return void
	 */
	public function testGetLinksFromArrayDescriptor( $linkDescs ) {
		$linkConverter = new LinkConverter();
		$links = $linkConverter->getLinkComponents( $linkDescs );

		$this->assertEquals( count( $linkDescs ), count( $links ) );

		foreach ( $links as $link ) {
			$link->getId();
		}
	}

	/**
	 *
	 * @return array
	 */
	public function provideGetLinksFromArrayDescriptorTestData() {
		return [
				'userpage' => [
					'text' => 'WikiSysop',
					'href' => '/wiki/User:WikiSysop',
				],
				'notifications-alert' => [
					'href' => '/wiki/Special:Notifications',
					'text' => new RawMessage( 'echo-notification-alert' ),
					'class' =>
					[
						0 => 'mw-echo-notifications-badge',
						1 => 'mw-echo-notification-badge-nojs',
						2 => 'oo-ui-icon-bell',
						3 => 'mw-echo-notifications-badge-all-read',
					],
					'data' =>
					[
						'counter-num' => 0,
						'counter-text' => '0',
					],
				],
				'notifications-notice' => [
					'href' => '/wiki/Special:Notifications',
					'text' => new RawMessage( 'echo-notification-notice' ),
					'class' => 'mw-echo-notifications-badge mw-echo-notification-badge-nojs',
					'data' =>
					[
						'counter-num' => 1,
						'counter-text' => '1',
					],
					'aria' => [
						'label' => 'my-notifications-notice-aria-label'
					]
				],
				'main' => [
					'class' => 'selected',
					'text' => 'Main page',
					'href' => 'http://mywiki.com/wiki/Main_Page',
					'id' => 'ca-nstab-main',
				],
				'talk' => [
					'class' => 'new',
					'text' => 'Discussion',
					'href' => 'https://mywiki.com/wiki/Talk:Main_Page&action=edit&redlink=1',
					'rel' => 'discussion',
					'id' => 'ca-talk',
				],
		];
	}
}
