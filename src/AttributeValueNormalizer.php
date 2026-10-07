<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class AttributeValueNormalizer {

	/**
	 * `Sanitizer` declares `strict_types`, so any non-string value must be converted
	 * before it is handed over to `Sanitizer::safeEncodeTagAttributes`.
	 *
	 * @param mixed $value
	 * @return mixed String if the value could be normalized, otherwise the unchanged value
	 */
	public static function normalize( $value ) {
		if ( is_bool( $value ) ) {
			return $value ? 'true' : 'false';
		}
		if ( $value === null ) {
			return 'null';
		}
		if ( is_int( $value ) || is_float( $value ) ) {
			return (string)$value;
		}

		return $value;
	}
}
