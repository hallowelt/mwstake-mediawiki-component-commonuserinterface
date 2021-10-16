<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class AriaAttributesBuilder {

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
			$attrib = 'aria-' . $key . '="' . $value . '"';
			array_push( $attribs, $attrib );
		}

		return $attribs;
	}

	/**
	 * @param array $data
	 * @return string
	 */
	public function toString( $data ) : string {
		$attribs = $this->build( $data );

		return implode( ' ', $attribs );
	}
}
