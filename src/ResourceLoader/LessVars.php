<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\ResourceLoader;

use Config;
use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\LessVars as LessVarsObject;
use ResourceLoaderContext;
use ResourceLoaderFileModule;

class LessVars extends ResourceLoaderFileModule {
	/**
	 *
	 * @param ResourceLoaderContext $context
	 * @return array
	 */
	public function getLessVars( ResourceLoaderContext $context ) {
		$lessVars = LessVarsObject::getInstance();
		return array_merge(
			parent::getLessVars( $context ),
			$lessVars->getAllVars()
		);
	}

	/**
	 * @return Config
	 * @since 1.24
	 */
	public function getConfig() {
		return MediaWikiServices::getInstance()->getMainConfig();
	}
}
