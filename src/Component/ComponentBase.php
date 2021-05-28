<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use IContextSource;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

abstract class ComponentBase implements IComponent {

	/**
	 *
	 * @inheritDoc
	 */
	public function getRequiredRLModules() : array {
		return [];
	}

	/**
	 *
	 * @inheritDoc
	 */
	public function getRequiredRLStyles() : array {
		return [];
	}

	/**
	 *
	 * @inheritDoc
	 */
	public function getSubComponents() : array {
		return [];
	}

	/**
	 *
	 * @inheritDoc
	 */
	public function shouldRender( IContextSource $context ) : bool {
		return true;
	}
}