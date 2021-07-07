<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class HtmlIdRegistry {

	/**
	 *
	 * @var HtmlIdRegistry|null
	 */
	private static $registry = null;

	/**
	 *
	 * @var array
	 */
	private $htmlIds = [];

	/**
	 *
	 * @var integer
	 */
	private $limit = 10000;

	/**
	 *
	 * @return HtmlIdRegistry
	 */
	public static function singleton() : HtmlIdRegistry{
		if ( self::$registry === null ) {
			self::$registry = new HtmlIdRegistry();
		}

		return self::$registry;
	}

	/**
	 *
	 */
	public function __construct() {
		$this->htmlIds = [];
	}

	/**
	 *
	 * @param string $id
	 * @return string
	 */
	public function makeHtmlIdSave( $id ) : string {
		if ( !in_array( $id, $this->htmlIds ) ) {
			array_push( $this->htmlIds, $id );
			return $id;
		}

		$suffix = 1;
		while ( $suffix <= $this->limit ) {
			$newId = $id . '-' . $suffix;
			if ( !in_array( $newId, $this->htmlIds ) ) {
				break;
			}
		}

		array_push( $this->htmlIds, $newId );

		return $newId;
	}
}