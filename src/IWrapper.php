<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

interface IWrapper {

	/**
	 * @ return bool
	 */
	public function enableWrapperHtml(): bool;

	/**
	 * @return array
	 */
	public function getClasses(): array;
}
