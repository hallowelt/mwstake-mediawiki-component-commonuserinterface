<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITree {

	/**
	 * @return string[]
	 */
	public function getClasses(): array;

	/**
	 * @return string
	 */
	public function getAriaLabelledBy(): string;
}
