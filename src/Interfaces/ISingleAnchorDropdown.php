<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Interfaces;

interface ISingleAnchorDropdown {
	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function getButtonClass();

	/**
	 * @return Message
	 */
	public function getButtonTitle();

	/**
	 * @return Message
	 */
	public function getButtonARIALabel();

	/**
	 * @return Message
	 */
	public function getButtonText();

	/**
	 * @return string
	 */
	public function getMenuClass();

	/**
	 * @return Message
	 */
	public function getMenuDescription();

	/**
	 * @return string
	 */
	public function getMenuBody();

	/**
	 * @return array
	 */
	public function getButtonDataAttibutes();
}
