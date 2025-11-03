<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests\Integration;

use MediaWikiIntegrationTestCase;
use MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder;

class DataAttributesBuilderTest extends MediaWikiIntegrationTestCase {

	/**
	 * @covers \MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder::build
	 *
	 * @return void
	 */
	public function testBuild() {
		$dataAttributesBuilder = new DataAttributesBuilder();

		$data = [
			'bs-toggle' => 'toggle-id',
			'mw' => 'some value',
			'evil' => '" mouseover="alert(\'Should not work\');"'
		];

		$dataAttributes = $dataAttributesBuilder->build( $data );
		$dataAttributesExpected = [
			'data-bs-toggle="toggle-id"',
			'data-mw="some value"',
			'data-evil="&quot; mouseover=&quot;alert(&#039;Should not work&#039;);&quot;"'
		];

		$this->assertEquals( $dataAttributesExpected, $dataAttributes );
	}
}
