<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleTreeTextNode;
use MWStake\MediaWiki\Component\CommonUserInterface\TreeData;
use PHPUnit\Framework\TestCase;

class TreeDataTest extends TestCase {

	public function testGetNodeDataTest() {
		$services = MediaWikiServices::getInstance();
		$objectFactory = $services->get( 'ObjectFactory' );

		$treeNodeData = new TreeData( $objectFactory );
		$nodes = $treeNodeData->getTreeNodes( $this->getInputData() );

		$this->assertEquals( $this->getExpectedData(), $nodes );
	}

	protected function getInputData(): array {
		return [
			[
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
				'options' => [
					'id' => 'root-node',
					'items' => [
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-2',
								'items' => []
							]
						],
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-3',
								'items' => [
									[
										'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
										'options' => [
											'id' => 'dummy-4',
											'items' => []
										]
									]
								]
							]
						]
					]
				]
			],
			[
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
				'options' => [
					'id' => 'dummy-5',
					'items' => [
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-6',
								'items' => []
							]
						]
					]
				]
			]
		];
	}

	protected function getExpectedData(): array {
		return [
			new SimpleTreeTextNode( [
				'id' => 'root-node',
				'items' => [
					new SimpleTreeTextNode( [
						'id' => 'dummy-2',
								'items' => []
					] ),
					new SimpleTreeTextNode( [
						'id' => 'dummy-3',
						'items' => [
							new SimpleTreeTextNode( [
								'id' => 'dummy-4',
									'items' => []
							] )
						]
					] ),
				]
			] ),
			new SimpleTreeTextNode( [
				'id' => 'dummy-5',
				'items' => [
					new SimpleTreeTextNode( [
						'id' => 'dummy-6',
						'items' => []
					] )
				]
			] )
		];
	}
}
