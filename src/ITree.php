<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITree {

	/**
	 * @return array
	 */
	public function getAriaAttributes(): array;

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole(): string;

}
