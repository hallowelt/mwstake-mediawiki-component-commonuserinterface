<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IDropdown extends IComponent {
	/**
	 * @return string[]
	 */
	public function getContainerClasses() : array;

	/**
	 * @return string
	 */
	public function getAriaLabel() : string;

	/**
	 * @return string
	 */
	public function getAriaDesc() : string;
}
