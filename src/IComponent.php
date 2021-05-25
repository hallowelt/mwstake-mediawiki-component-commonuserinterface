<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IComponent {

	/**
	 *
	 * @return string
	 */
	public function getId() : string;

	public function getRequiredRLModules() : array;

	public function getRequiredRLStyles() : array;
}