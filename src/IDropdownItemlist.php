<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IDropdownItemlist {

	/**
	 * @return string[]
	 */
	public function getClasses() : array;

	/**
	 * @inheritDoc
	 */
	public function getLinks() : array;
}
