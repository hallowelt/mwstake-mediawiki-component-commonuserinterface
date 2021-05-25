<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

interface IComponent {
	/**
	 *
	 * @return string
	 */
	public function getId() : string;

	public function getRequiredRLModules() : array;

	public function getRequiredRLStyles() : array;

	public function shouldRender( IContextSource $context ) : bool;
}