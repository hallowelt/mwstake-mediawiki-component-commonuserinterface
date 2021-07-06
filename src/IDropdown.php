<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface IDropdown extends IComponent {
	/**
	 * @return string[]
	 */
	public function getContainerClasses() : array;

	/**
	 * @return Message
	 */
	public function getAriaLabel() : Message;

	/**
	 * @return Message
	 */
	public function getAriaDesc() : Message;
}
