<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\Message\Message;

interface IActionLink {

	/**
	 * @return string[]
	 */
	public function getClasses(): array;

	/**
	 * @return Message
	 */
	public function getText(): Message;

	/**
	 * @return array
	 */
	public function getDataAttributes(): array;

	/**
	 * @return array
	 */
	public function getAriaAttributes(): array;

	/**
	 * @return string
	 */
	public function getHref(): string;

	/**
	 * @return Message
	 */
	public function getTitle(): Message;

	/**
	 * @return Message
	 */
	public function getAriaLabel(): Message;

	/**
	 * @return string
	 */
	public function getRel(): string;

	/**
	 * @return bool
	 */
	public function showAction(): bool;

	/**
	 * @return string
	 */
	public function getActionClass(): string;

	/**
	 * @return string
	 */
	public function getIcon(): string;

	/**
	 * @return Message
	 */
	public function getActionAriaLabel(): Message;

	/**
	 * @return Message
	 */
	public function getActionTitle(): Message;

	/**
	 * @return Message
	 */
	public function getActionLabel(): Message;

	/**
	 * @return bool
	 */
	public function showActionLabel(): bool;

}