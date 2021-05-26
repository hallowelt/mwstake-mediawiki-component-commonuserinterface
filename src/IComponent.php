<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IComponent {

	/**
	 *
	 * @return string
	 */
	public function getId() : string;

	/**
	 *
	 * @return string[]
	 */
	public function getRequiredRLModules() : array;

	/**
	 *
	 * @return string[]
	 */
	public function getRequiredRLStyles() : array;
}