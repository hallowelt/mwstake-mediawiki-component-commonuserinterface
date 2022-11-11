<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleTreeTextNode;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleTreeLinkNode;
use MWStake\MediaWiki\Component\CommonUserInterface\TreeDataGenerator;
use PHPUnit\Framework\TestCase;

class TreeDataGeneratorTest extends TestCase {

	public function testGetNodeDataTest() {
		require_once( '../../bootstrap.php' );

		$services = MediaWikiServices::getInstance();
	
		$treeDataGenerator = $services->get( 'MWStakeCommonUITreeDataGenerator' );

		$nodes = $treeDataGenerator->generate( $this->getInputData() );

		$this->assertEquals( $this->getExpectedData(), $nodes );
	}

	protected function getInputData(): array {
		return [
			[
				'id' => 'root-node',
				'text' => 'node-1',
				'items' => [
					[
						'id' => 'dummy-2',
						'text' => 'node-3',
						'href' => 'test',
						'items' => []
					],
					[
						'id' => 'dummy-3',
						'text' => 'node-4',
						'items' => [
							[
								'id' => 'dummy-4',
								'text' => 'node-5',
								'items' => []
							]
						]
					]
				]
			],
			[
				'id' => 'dummy-5',
				'text' => 'node-2',
				'items' => [
					[
						'id' => 'dummy-6',
						'text' => 'node-6',
						'items' => []
					]
				]
			]
		];
	}

	protected function getExpectedData(): array {
		return [
			new SimpleTreeTextNode( [
				'id' => 'root-node',
				'text' => 'node-1',
				'items' => [
					new SimpleTreeLinkNode( [
						'id' => 'dummy-2',
						'text' => 'node-3',
						'href' => 'test',
						'items' => []
					] ),
					new SimpleTreeTextNode( [
						'id' => 'dummy-3',
						'text' => 'node-4',
						'items' => [
							new SimpleTreeTextNode( [
								'id' => 'dummy-4',
								'text' => 'node-5',
								'items' => []
							] ),
						]
					] ),
				]
			] ),
			new SimpleTreeTextNode( [
				'id' => 'dummy-5',
				'text' => 'node-2',
				'items' => [
					new SimpleTreeTextNode( [
						'id' => 'dummy-6',
						'text' => 'node-6',
						'items' => []
					] ),
				]
			] ),
		];
	}
}
