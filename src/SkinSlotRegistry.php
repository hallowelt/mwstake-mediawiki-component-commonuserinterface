<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class SkinSlotRegistry {

	/**
	 *
	 * @param string $skinSlot
	 * @param IComponent[] $components
	 * @return void
	 */
	public function register( $skinSlot, $components ) {
		if ( !array_key_exists( $skinSlot, $GLOBALS['mwsgCommonUISkinSlots'] ) ) {
			$GLOBALS['mwsgCommonUISkinSlots'][$skinSlot] = [];
		}
		array_merge(
			$GLOBALS['mwsgCommonUISkinSlots'][$skinSlot],
			$components
		);
	}

	/**
	 *
	 * @return array
	 */
	public function getSkinSlots() : array {
		return $GLOBALS['mwsgCommonUISkinSlots'];
	}
}
