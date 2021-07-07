<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface IButton extends IComponent {

	/**
	 *
	 * @return Message
	 */
	public function getAriaLabel() : Message;

	/**
	 * @return Message
	 */
	public function getText() : Message;

	/**
	 * @inheritDoc
	 */
	public function getContainerClasses() : array;

	/**
	 *
	 * @return bool
	 */
	public function isDisabled() : bool ;
}
