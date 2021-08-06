<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class SkinSlotRegistry implements ISkinSlotRegistry {

	/**
	 *
	 * @var array
	 */
	private $slotSpecs = [];

	/**
	 *
	 * @param array $slotSpecs
	 */
	public function __construct( $slotSpecs ) {
		$this->slotSpecs = $slotSpecs;
	}

	/**
	 *
	 * @param string $skinSlot
	 * @param IComponent[] $components
	 * @return void
	 */
	public function register( $skinSlot, $components ) {
		if ( !array_key_exists( $skinSlot, $this->slotSpecs ) ) {
			$this->slotSpecs[$skinSlot] = [];
		}
		$this->slotSpecs[$skinSlot] = array_merge( $components, $this->slotSpecs[$skinSlot] );
	}

	/**
	 *
	 * @return array
	 */
	public function getSkinSlots() : array {
		return $this->slotSpecs;
	}
}
