<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITreeNode {

	/**
	 * @return boolean
	 */
	public function isExpanded(): bool;

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

	/**
	 * @return array
	 */
	public function getIconExpandClasses(): array;
	
	/**
	 * @return array
	 */
	public function getIconCollapseClasses(): array;

	/**
	 * @return array
	 */
	public function getIconBeforeClasses(): array;
	
	/**
	 * @return array
	 */
	public function getIconAfterClasses(): array;
}
