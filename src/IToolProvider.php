<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IToolProvider {

	/**
	 * @return ITool[]
	 */
	public function getTools() : array;

}