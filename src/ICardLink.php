<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface ICardLink {

	/**
	 * @return string[]
	 */
	public function getContainerClasses() : array;

	/**
	 * @return array
	 */
	public function getDataAttributes() : array;

	/**
	 * @return string
	 */
	public function getUrl() : string;

	/**
	 * @return Message
	 */
	public function getTitle() : Message;

	/**
	 * @return Message
	 */
	public function getText() : Message;

	/**
	 * @return string
	 */
	public function getRole() : string;
}
