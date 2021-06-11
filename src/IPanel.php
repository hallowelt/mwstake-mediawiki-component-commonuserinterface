<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface IPanel {

	/**
	 * @return Message
	 */
	public function getTitle();

	/**
	 * @return Message
	 */
	public function getTitleTooltip();

	/**
	 * @return ITool[]
	 */
	public function getTools();

	/**
	 * @return IBadge[]
	 */
	public function getBadges();

	/**
	 * @return string[]
	 */
	public function getTriggerRLDependencies();

	/**
	 * @return string
	 */
	public function getTriggerCallbackFunctionName();

	/**
	 * @return string[]
	 */
	public function getContainerClasses();

	/**
	 * @return array
	 */
	public function getContainerData();

	/**
	 *
	 * @return bool
	 */
	public function getPanelCollapseState();
}
