<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\ITool;

interface IToolProvider {

	/**
	 * @return ITool[]
	 */
	public function getTools() : array;

}