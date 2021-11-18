<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

interface IAccordionItem extends IComponent {

	/**
	 *
	 * @return Message
	 */
	public function getHeaderText() : Message;

	/**
	 * @return Message
	 */
	public function getTooltip() : Message;
}
