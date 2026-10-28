<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\Message\Message;
use Wikimedia\HtmlArmor\HtmlArmor;

interface ITreeTextNode {

	/**
	 * @return Message
	 */
	public function getText(): Message;

	/**
	 * @return HtmlArmor
	 */
	public function getPreHtml(): HtmlArmor;
}
