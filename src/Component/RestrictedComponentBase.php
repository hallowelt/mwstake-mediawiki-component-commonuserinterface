<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use IContextSource;
use MediaWiki\MediaWikiServices;
use Skin\BlueSpiceDiscovery\IRestrictedComponent;

abstract class RestrictedComponentBase extends ComponentBase implements IRestrictedComponent {

	/**
	 *
	 * @inheritDoc
	 */
	public function shouldRender( IContextSource $context ): bool {
		if ( empty( $this->getPermissions() ) ) {
			return false;
		}
		$user = $context->getUser();
		$services = MediaWikiServices::getInstance();
		foreach ( $this->getPermissions() as $permission ) {
			$userHasRight = $services->getPermissionManager()->userHasRight(
				$user,
				$permission
			);
			if ( $userHasRight ) {
				return true;
			}
		}
		return false;
	}

}
