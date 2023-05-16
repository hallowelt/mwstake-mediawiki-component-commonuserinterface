<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;

interface IComponentFilter {

	/**
	 *
	 * @param IComponent $component
	 * @param IContextSource $context
	 * @return boolean
	 */
	public function shouldRender( IComponent $component, IContextSource $context ): bool;

}
