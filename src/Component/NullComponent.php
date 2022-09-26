<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use IContextSource;

class NullComponent extends ComponentBase {

	/**
	 * @return string
	 */
	public function getId(): string {
		return 'null-component';
	}

	/**
	 * @param IContextSource $context
	 * @return boolean
	 */
	public function shouldRender( IContextSource $context ) : bool {
		return false;
	}
}
