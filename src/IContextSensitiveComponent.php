<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

interface IContextSensitiveComponent {

	public function shouldRender( IContextSource $context ) : bool;
}