<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

interface IContextSensitiveComponent {

	/**
	 *
	 * @param IContextSource $context
	 * @return boolean
	 */
	public function shouldRender( IContextSource $context ) : bool;
}