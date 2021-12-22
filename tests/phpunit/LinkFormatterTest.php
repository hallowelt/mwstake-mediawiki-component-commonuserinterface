<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use MWStake\MediaWiki\Component\CommonUserInterface\LinkFormatter;
use PHPUnit\Framework\TestCase;
use RawMessage;

class LinkFormatterTest extends TestCase {

	/**
	 * @covers LinkFormatter::formatLinks
	 * @return void
	 */
	public function testFormatLinks() {
		$linkFormatter = new LinkFormatter( '_blank', true );

		$links = $linkFormatter->formatLinks( $this->inputLinks() );

		$this->assertEquals( count( $this->inputLinks() ), count( $links ) );
		$this->assertEquals( $links, $this->outputLinks() );
	}

	/**
	 *
	 * @return array
	 */
	public function inputLinks() {
		return [
			'link-1' => [
				'text' => 'Link 1',
				'class' => 'link-1-class',
				'href' => 'https://test.com/test-me'
			],
			'link-2' => [
				'text' => 'Link 2',
				'href' => '/test-me'
			],
			'link-3' => [
				'text' => 'Link 3',
				'href' => '/test-me',
				'class' => [
					0 => 'mw-echo-notifications-badge',
					1 => 'mw-echo-notification-badge-nojs'
				]
			]
		];
	}

	/**
	 *
	 * @return array
	 */
	public function outputLinks() {
		return [
			[
				'text' => 'Link 1',
				'class' => 'link-1-class',
				'href' => 'https://test.com/test-me',
				'target' => '_blank',
				'rel' => 'nofollow noreferrer noopener'
			],
			[
				'text' => 'Link 2',
				'href' => '/test-me',
				'rel' => 'nofollow'
			],
			[
				'text' => 'Link 3',
				'href' => '/test-me',
				'class' => 'mw-echo-notifications-badge mw-echo-notification-badge-nojs',
				'rel' => 'nofollow'
			]
		];
	}
}