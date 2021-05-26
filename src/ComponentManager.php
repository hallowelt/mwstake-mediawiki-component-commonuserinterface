<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class ComponentManager {

	/**
	 *
	 * @return void
	 */
	public function init() {
		//Load all "skin slots", build up component trees, get RL modules to load from each component
	}

	/**
	 *
	 * @return string[]
	 */
	public function getRLModules() {
		$modules = [];

		//TODO: Implement

		return $modules;
	}

	/**
	 *
	 * @return string[]
	 */
	public function getRLModuleStyles() {
		$moduleStyles = [];

		//TODO: Implement

		return $moduleStyles;
	}

}