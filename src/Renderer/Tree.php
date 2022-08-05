<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITree;

class Tree extends RendererBase {

	/**
	 *
	 * @var MainConfig
	 */
	private $mainConfig = null;

	/**
	 *
	 * @param MainConfig $mainConfig
	 */
	public function __construct( $mainConfig ) {
		parent::__construct();

		$this->mainConfig = $mainConfig;
		$this->externalLinkTarget = $this->mainConfig->get( 'ExternalLinkTarget' );
	}

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ITree;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILink $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ): array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ITree ) {
			$templateData = [
				'id' => $component->getId(),
				'classes' => $component->getClasses(),
				'body' => $subComponentNodes
			];

			if ( $component->getAriaLabelledBy() !== '' ) {
				$templateData['aria-labelledby'] = $component->getAriaLabelledBy();
			}

		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . '/tree.mustache';
	}
}
