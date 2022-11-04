<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITreeNode {

	/**
	 * @return boolean
	 */
	public function expanded(): bool;

	/**
	 * @return array
	 */
	public function getAriaAttributes(): array;

	/**
	 * @return array
	 */
	public function getClasses(): array;

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole(): string;

	/**
	 * @param array $options
	 * @return void
	 */
	public function setNodeOptions( array $options ): void;
}
