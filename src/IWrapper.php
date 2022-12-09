<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

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
