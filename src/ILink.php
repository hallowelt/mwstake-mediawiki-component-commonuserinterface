<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\Interfaces\IComponent;

interface ILink extends IComponent {

	/**
	 *
	 * @return string
	 */
	public function getHref() : string;

	/**
	 *
	 * @return Message
	 */
	public function getText() : Message;

	/**
	 *
	 * @return Message
	 */
	public function getTitle() : Message;

	/**
	 *
	 * @return array
	 */
	public function getClasses() : array;

	/**
	 *
	 * @return array
	 */
	public function getDataAttributes() : array;

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole() : string;

	/**
	 *
	 * @return string
	 */
	public function getRel() : string;

}
