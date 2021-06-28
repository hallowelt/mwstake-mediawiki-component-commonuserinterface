<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Message;

interface IButton extends IComponent {

	public const TYPE_PRIMARY = 'primary';
	public const TYPE_SECONDARY = 'seconday';
	public const TYPE_SUCCESS = 'success';
	public const TYPE_DANGER = 'danger';
	public const TYPE_WARNING = 'warning';
	public const TYPE_INFO = 'info';

	/**
	 *
	 * @return Message
	 */
	public function getLabel() : Message;

	/**
	 * One of the `IButton::TYPE_*` values
	 *
	 * @return string
	 */
	public function getType() : string;

	/**
	 * @return Message
	 */
	public function getTooltip() : Message;

	/**
	 *
	 * @return boolean
	 */
	public function isDisabled() : bool;

}
