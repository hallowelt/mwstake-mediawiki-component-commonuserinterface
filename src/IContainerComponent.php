<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IContainerComponent {

	/**
	 * @return IComponent[]
	 */
	public function getSubComponents() : array;

}