<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITreeTextNode {

	/**
	 * @return string
	 */
	public function getText(): string;

	/**
	 * @return array
	 */
	public function getClasses(): array;
}
