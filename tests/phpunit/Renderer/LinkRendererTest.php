<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests\Renderer;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleLink;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponentRenderer;
use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Link as LinkRenderer;
use PHPUnit\Framework\TestCase;
use RawMessage;
use HashConfig;

class LinkRendererTest extends TestCase {

	/**
	 * @covers BatchRenderer::getHtml
	 *
	 * @return void
	 */
	public function testGetHtml() {
		$renderer = $this->getRenderer();
		$component = $this->getComponent();
		$subComponentNodes = $this->getSubComponentNodes();
		$templateData = $renderer->getRendererDataTreeNode( $component, $subComponentNodes );

		$html = $renderer->getHtml( $templateData );
		$$expectedHtml = $this->getExpectedHtml();
		$this->assertEquals( $$expectedHtml, $html );
	}

	/**
	 * @return IComponentRenderer
	 */
	private function getRenderer(): IComponentRenderer {
		$config = new HashConfig( [
			'ExternalLinkTarget' => true
		] );
		return new LinkRenderer( $config );
	}

	/**
	 * @return IComponent
	 */
	private function getComponent(): IComponent {
		return new SimpleLink(  [
			'id' => 'dummy',
			'role' => '',
			'classes' => [ 'renderer-test', 'link-renderer'],
			'href' => '',
			'title' => new RawMessage( 'SimpleLink" onmouseover="alert( \"Should not work\" )"' ),
			'aria-label' => new RawMessage( 'SimpleLink" onmouseover="alert( \"Should not work\" )"' ),
			'rel' => '',
			'data' => [
				'good' => 'okay',
				'evil' => '" onmouseover="alert( \"Should not work\" )"'
			],
			'items' => [],
			'aria' => [
				'good' => 'okay',
				'evil' => '" onmouseover="alert( \"Should not work\" )"'
			]
		],  );
	}

	/**
	 * @return array
	 */
	private function getSubComponentNodes(): array {
		return [];
	}

	private function getExpectedHtml(): string {
		$expectedHtml = file_get_contents( __DIR__ . '/results/link.html' );
		if ( !$expectedHtml ) {
			$expectedHtml = 'NO RESULT FILE';
		}
		return $expectedHtml;
	}
}