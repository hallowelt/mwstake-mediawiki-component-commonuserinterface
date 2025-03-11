<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use HtmlArmor;
use Message;

interface ITreeLinkNode {

	/**
	 * @return Message
	 */
	public function getText(): Message;

	/**
	 * @return Message
	 */
	public function getTitle(): Message;

	/**
	 * @return string
	 */
	public function getHref(): string;

	/**
	 * @return HtmlArmor
	 */
	public function getPreHtml(): HtmlArmor;
}
