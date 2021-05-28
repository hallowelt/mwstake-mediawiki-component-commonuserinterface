<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;

/**
 * Inspired by https://getbootstrap.com/docs/5.0/components/badge/
 */
interface IBadge {

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
	public function getText() : Message;

	/**
	 * One of the `IBadge::TYPE_*` values
	 *
	 * @return string
	 */
	public function getType() : string;

	/**
	 * Required for A11Y. Can be rendered into an `.visually-hidden` element
	 * or an `aria-label` attribute
	 * @return Message
	 */
	public function getA11YText() : Message;
}
