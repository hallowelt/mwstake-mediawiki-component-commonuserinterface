<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class SkinSlotRendererFactory {

	/**
	 * @param string $slotId
	 * @return ISkinSlotRenderer
	 */
	public function create( string $slotId ) : ISkinSlotRenderer {
		$renderer = new GenericSkinSlotRenderer();

		return $renderer;
	}

}
