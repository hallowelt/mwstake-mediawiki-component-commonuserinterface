<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests\Integration;

use MediaWikiIntegrationTestCase;
use MWStake\MediaWiki\Component\CommonUserInterface\LinkFormatter;

class LinkFormatterTest extends MediaWikiIntegrationTestCase {

	protected function setUp(): void {
		parent::setUp();
	}

	/**
	 * @param bool|string $externalLinkTarget
	 * @param bool $noFollowLinks
	 * @param array $unformattedLinks
	 * @param array $expectedLinks
	 * @covers \MWStake\MediaWiki\Component\CommonUserInterface\LinkFormatter::formatLinks
	 * @return void
	 * @dataProvider provideFormatLinksData
	 */
	public function testFormatLinks( $externalLinkTarget, $noFollowLinks,
		$unformattedLinks, $expectedLinks ) {
		$this->setUserLang( 'qqx' );
		$linkFormatter = new LinkFormatter( $externalLinkTarget, $noFollowLinks );
		$actualLinks = $linkFormatter->formatLinks( $unformattedLinks );

		$this->assertEquals( $expectedLinks, $actualLinks );
	}

	/**
	 * @param bool|string $externalLinkTarget
	 * @param bool $noFollowLinks
	 * @param array $unformattedLinks
	 * @param array $expectedLinks
	 * @covers \MWStake\MediaWiki\Component\CommonUserInterface\LinkFormatter::formatLinks
	 * @return void
	 * @dataProvider provideNonExistentMessageData
	 */
	public function testFormatLinksWithNonExistentMessages( $externalLinkTarget, $noFollowLinks,
		$unformattedLinks, $expectedLinks ) {
		$this->setUserLang( 'en' );
		$linkFormatter = new LinkFormatter( $externalLinkTarget, $noFollowLinks );
		$actualLinks = $linkFormatter->formatLinks( $unformattedLinks );

		$this->assertEquals( $expectedLinks, $actualLinks );
	}

	/**
	 *
	 * @return array
	 */
	public function provideFormatLinksData() {
		return [
			'external-link-1' => [
				'_blank',
				true,
				[
					'link-1' => [
						'text' => 'link-1-text',
						'class' => 'link-1-class',
						'href' => 'https://test.com/test-me'
					]
				],
				[
					[
						'text' => '(link-1-text)',
						'class' => 'link-1-class',
						'href' => 'https://test.com/test-me',
						'target' => '_blank',
						'rel' => 'nofollow noreferrer noopener'
					]
				]
			],
			'internal-link-1' => [
				'_blank',
				true,
				[
					'link-2' => [
						'text' => 'link-2-text',
						'href' => '/test-me'
					]
				],
				[
					[
						'text' => '(link-2-text)',
						'href' => '/test-me',
						'rel' => 'nofollow'
					]
				]
			],
			'internal-link-2' => [
				'_blank',
				true,
				[
					'link-3' => [
						'text' => 'link-3-text',
						'href' => '/test-me',
						'class' => [
							0 => 'mw-echo-notifications-badge',
							1 => 'mw-echo-notification-badge-nojs'
						]
					]
				],
				[
					[
						'text' => '(link-3-text)',
						'href' => '/test-me',
						'class' => 'mw-echo-notifications-badge mw-echo-notification-badge-nojs',
						'rel' => 'nofollow'
					]
				]
			],
			'key-fallback' => [
				false,
				false,
				[
					'my-msg-key' => [
						'href' => '/page'
					]
				],
				[
					[
						'text' => '(my-msg-key)',
						'title' => '(my-msg-key)',
						'href' => '/page'
					]
				]
			],
			'msg-field' => [
				false,
				false,
				[
					'some-key' => [
						'msg' => 'custom-msg',
						'href' => '/page'
					]
				],
				[
					[
						'msg' => 'custom-msg',
						'text' => '(custom-msg)',
						'title' => '(some-key)',
						'href' => '/page'
					]
				]
			]
		];
	}

	/**
	 * When a non-existent message key is passed, Message::text() returns
	 * the key wrapped in ⧼⧽ characters (U+29FC, U+29FD).
	 *
	 * @return array
	 */
	public function provideNonExistentMessageData() {
		return [
			'literal-text-in-text-field' => [
				false,
				false,
				[
					'some-key' => [
						'text' => 'Some literal text instead of a message key',
						'href' => '/page'
					]
				],
				[
					[
						'text' => "\u{29FC}Some literal text instead of a message key\u{29FD}",
						'title' => "\u{29FC}some-key\u{29FD}",
						'href' => '/page'
					]
				]
			],
			'literal-text-in-title-field' => [
				false,
				false,
				[
					'some-key' => [
						'text' => 'Not a real message key',
						'title' => 'Also not a real message key',
						'href' => '/page'
					]
				],
				[
					[
						'text' => "\u{29FC}Not a real message key\u{29FD}",
						'title' => "\u{29FC}Also not a real message key\u{29FD}",
						'href' => '/page'
					]
				]
			],
			'non-existent-key-fallback' => [
				false,
				false,
				[
					'this-message-does-not-exist' => [
						'href' => '/some-page'
					]
				],
				[
					[
						'text' => "\u{29FC}this-message-does-not-exist\u{29FD}",
						'title' => "\u{29FC}this-message-does-not-exist\u{29FD}",
						'href' => '/some-page'
					]
				]
			],
			'non-existent-msg-field' => [
				false,
				false,
				[
					'key' => [
						'msg' => 'this-msg-key-does-not-exist-either',
						'href' => '/page'
					]
				],
				[
					[
						'msg' => 'this-msg-key-does-not-exist-either',
						'text' => "\u{29FC}this-msg-key-does-not-exist-either\u{29FD}",
						'title' => "\u{29FC}key\u{29FD}",
						'href' => '/page'
					]
				]
			]
		];
	}
}
