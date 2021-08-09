<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ISkinSlotRenderer {

	/**
	 *
	 * @return string
	 */
	public function getHtml() : string;
}
