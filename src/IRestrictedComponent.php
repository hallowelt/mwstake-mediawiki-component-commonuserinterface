<?php

namespace Skin\BlueSpiceDiscovery;

interface IRestrictedComponent {

	/**
	 *
	 * @return string[]
	 */
	public function getPermissions() : array;
}
