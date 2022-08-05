<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface ITreeItem {

	/**
	 * @return string
	 */
	public function getId(): string;

	/**
	 * @return string[]
	 */
	public function getClasses(): array;

	/**
	 * @return boolean
	 */
	public function hasPopup(): bool;

	/**
	 * @return boolean
	 */
	public function expanded(): bool;

	/**
	 * @return Message
	 */
	public function getText() : Message;

	/**
	 * @return Message
	 */
	public function getTitle() : Message;

	/**
	 * @return string
	 */
	public function getHref() : string;

	/**
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
	 * @return string
	 */
	public function getRel() : string;
}
