<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use IContextSource;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IPanel;
use MWStake\MediaWiki\Component\CommonUserInterface\IButton;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleButton;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimplePanel;
use RawMessage;
use PHPUnit\Framework\TestCase;

class GenericComponentRendererTest extends TestCase {

	public function testGetHtml() {

		$componentTree = [
			'my-panel' => [
				'component' => new SimplePanel( [] ),
				'subComponents' => [
					'my-literal' => [ 'component' => new Literal( 'my-literal', 'This is a test of component \'literal\'' ), 'subComponents' => [] ],
					'my-button' => [ 'component' => new SimpleButton( [] ), 'subComponents' => [] ]
				]
			]
		];

		$mockRenderer = $this->createMock( IComponentRenderer::class );
		$mockRenderer->method( 'getTemplateData' )->willReturn();
		$mockRenderer->method( 'getHtml' )->will(
			$this->returnCallback( function ( $data ) {
				return '###';
			}
		) );
		$mockRendererFactory = $this->createMock();
		$mockRendererFactory->method( 'makeForComponent' )->willReturn( $mockRenderer );
		$renderer = new GenericComponentRenderer( $mockRendererFactory );
		$html = $renderer->getHtml( $componentTree );

		$expectedHtml = <<<HERE
###PANEL-START###
###LITERAL###
###BUTTON###
###PANEL-END###
HERE;
		$this->assertEquals( $expectedHtml, $html );
	}
}