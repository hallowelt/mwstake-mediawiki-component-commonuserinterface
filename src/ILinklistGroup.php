<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ILinklistGroup {

	/**
	 * @return string[]
	 */
	public function getContainerClasses() : array;

	/**
	 * @inheritDoc
	 */
	public function getLinks() : array;
}
