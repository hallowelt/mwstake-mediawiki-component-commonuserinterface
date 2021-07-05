<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Api;

use ApiBase;
use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\RendererDataTreeBuilder;
use Wikimedia\ParamValidator\ParamValidator;

class SkinSlot extends ApiBase {
	public function execute() {
		$path = $this->getParameter( 'path' );
		$pathParts = explode( '/', $path );
		$slotId = array_shift( $pathParts );

		$services = MediaWikiServices::getInstance();

		/** @var ComponentManager */
		$componentManager = $services->getService( 'MWStakeCommonUIComponentManager' );

		/** @var RendererDataTreeBuilder */
		$rendererDataTreeBuilder = $services->getService( 'MWStakeCommonUIRendererDataTreeBuilder' );

		$componentTree = $componentManager->getSkinSlotComponentTree( $slotId );
		$rendererDataTree = $rendererDataTreeBuilder->getRendererDataTree( $componentTree );

		$result = $this->getResult();
		$result->addValue( null, 'data', $rendererDataTree );
	}

	/**
	 * Called by ApiMain
	 * @return array
	 */
	public function getAllowedParams() {
		return parent::getAllowedParams() + [
			'path' => [
				ParamValidator::PARAM_TYPE => 'string',
				ParamValidator::PARAM_REQUIRED => false,
				ParamValidator::PARAM_DEFAULT => '',
				static::PARAM_HELP_MSG => 'apihelp-mwstake-commonui-skinslot-param-path',
			],
			'context' => [
				ParamValidator::PARAM_TYPE => 'string',
				ParamValidator::PARAM_REQUIRED => false,
				ParamValidator::PARAM_DEFAULT => '{}',
				static::PARAM_HELP_MSG => 'apihelp-mwstake-commonui-skinslot-param-context',
			],
		];
	}
}
