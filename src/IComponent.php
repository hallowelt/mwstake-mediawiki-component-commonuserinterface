<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

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

	/**
	 * @return IComponent[]
	 */
	public function getSubComponents() : array;

	/**
	 *
	 * @param IContextSource $context
	 * @return boolean
	 */
	public function shouldRender( IContextSource $context ) : bool;
}
