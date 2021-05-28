<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class SkinSlotRendererFactory {

	/**
	 * @param string $slotId
	 * @return SkinSlotRenderer
	 */
	public function create( string $slotId ) : SkinSlotRenderer {
		$renderer = new SkinSlotRenderer();

		// TODO: Implement

		return $renderer;
	}

}
