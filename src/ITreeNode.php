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
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole(): string;

	/**
	 * @param array $data
	 * @return void
	 */
	public function setNodeData( array $data ): void;
}
