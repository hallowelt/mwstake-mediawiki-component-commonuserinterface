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

		$nodes = $treeDataGenerator->generate( $this->getInputData(), $this->getExpandPaths() );

		$this->assertEquals( $this->getExpectedData(), $nodes );
	}

	/**
	 * @return array
	 */
	protected function getExpandPaths(): array {
		return [
			'dummy-1/dummy-3',
			'dummy-5',
		];
	}

	/**
	 * @return array
	 */
	protected function getInputData(): array {
		return [
			[
				'id' => 'dummy-1',
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
						'items' => [
							[
								'id' => 'dummy-7',
								'text' => 'node-7',
								'items' => [
										[
										'id' => 'dummy-8',
										'text' => 'node-8',
										'items' => []
									]
								]
							]
						]
					]
				]
			]
		];
	}

	/**
	 * @return array
	 */
	protected function getExpectedData(): array {
		return [
			new SimpleTreeTextNode( [
				'id' => 'dummy-1',
				'text' => 'node-1',
				'aria' => [
					'expanded' => true
				],
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
						'aria' => [
							'expanded' => true
						],
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
				'aria' => [
					'expanded' => true
				],
				'items' => [
					new SimpleTreeTextNode( [
						'id' => 'dummy-6',
						'text' => 'node-6',
						'items' => [
							new SimpleTreeTextNode( [
								'id' => 'dummy-7',
								'text' => 'node-7',
								'items' => [
									new SimpleTreeTextNode( [
										'id' => 'dummy-8',
										'text' => 'node-8',
										'items' => []
									] ),
								]
							] ),
						]
					] ),
				]
			] ),
		];
	}
}
