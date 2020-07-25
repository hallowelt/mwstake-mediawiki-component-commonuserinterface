<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\ResourceLoader;

use Config;
use MediaWiki\MediaWikiServices;
use ResourceLoaderContext;
use ResourceLoaderFileModule;

class LessVars extends ResourceLoaderFileModule {
	/**
	 *
	 * @param ResourceLoaderContext $context
	 * @return array
	 */
	public function getLessVars( ResourceLoaderContext $context ) {
		return array_merge(
			parent::getLessVars( $context ),
			$this->getConfig()->get( 'CommonStylesLessVars' )
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
