<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class DataAttributesBuilder {
	/**
	 * @return StdClass
	 */
	public static function factory() {
		return new static();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function build( $data ) : array {
		$attribs = [];

		foreach ( $data  as $key => $value ) {
			$attrib = 'data-' . $key . '="' . $value . '"';
			array_push( $attribs, $attrib );
		}

		return $attribs;
	}
}
