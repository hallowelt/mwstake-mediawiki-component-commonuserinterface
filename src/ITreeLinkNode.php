<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\Message\Message;
use Wikimedia\HtmlArmor\HtmlArmor;

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

	/**
	 * @return array
	 */
	public function getData(): array;
}
