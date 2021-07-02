<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\ResourceLoader;

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentRendererFactory;
use ResourceLoaderModule;

class ComponentRenderer extends ResourceLoaderModule {

	/**
	 *
	 * @return void
	 */
	public function getTemplates() {
		$templates = [];
		$services = MediaWikiServices::getInstance();
		/** @var ComponentRendererFactory */
		$rendererFactory = $services->get( 'MWStakeCommonUIComponentRendererFactory' );
		$renderers = $rendererFactory->getAllRenderers();
		foreach ( $renderers as $rendererKey => $renderer ) {
			// Keep aligned with `Setup::makeClientSideRendererConfig`
			$templateKey = sha1( $renderer->getTemplatePathname() ) . '.mustache';
			$templates[$templateKey] = realpath( $renderer->getTemplatePathname() );
		}

		return $templates;
	}
}
