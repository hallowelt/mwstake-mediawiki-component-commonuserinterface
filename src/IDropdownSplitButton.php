<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface IDropdownSplitButton extends IComponent {

	/**
	 * @return string[]
	 */
	public function getContainerClasses() : array;

	/**
	 * @return string[]
	 */
	public function getButtonGroupClasses() : array;

	/**
	 * @return string[]
	 */
	public function getMainButtonClasses() : array;

	/**
	 * @return string[]
	 */
	public function getMenuButtonClasses() : array;

	/**
	 * @return string[]
	 */
	public function getMenuClasses() : array;

	/**
	 * @return Message
	 */
	public function getMainButtonText() : Message;

	/**
	 * @return Message
	 */
	public function getMainButtonTitle() : Message;

		/**
	 * @return Message
	 */
	public function getMenuButtonTitle() : Message;

	/**
	 * @return Message
	 */
	public function getButtonGroupAriaLabel() : Message;

	/**
	 * @return Message
	 */
	public function getMainButtonAriaLabel() : Message;

	/**
	 * @return Message
	 */
	public function getMenuButtonAriaLabel() : Message;

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getButtonGroupRole() : string;
}
