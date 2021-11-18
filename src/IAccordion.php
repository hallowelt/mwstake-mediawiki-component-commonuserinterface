<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

interface IAccordion extends IComponent {
	/**
	 *
	 * @return Message
	 */
	public function getLabel() : Message;
}
