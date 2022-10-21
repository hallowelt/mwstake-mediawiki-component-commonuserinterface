<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ITreeNode {

	/**
	 * @return string
	 */
	public function getId(): string;

	/**
	 * @return string[]
	 */
	public function getClasses(): array;

	/**
	 * @return boolean
	 */
	public function hasPopup(): bool;

	/**
	 * @return boolean
	 */
	public function expanded(): bool;

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
