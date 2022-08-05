<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeItem;

class TreeItem extends RendererBase {

	/**
	 *
	 * @var MainConfig
	 */
	private $mainConfig = null;

	/**
	 * @var bool
	 */
	private $externalLinkTarget = true;

	/**
	 * See https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
	 *
	 * @var array
	 */
	private $rel = [ 'external', 'noreferrer', 'noopener' ];

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
		return $component instanceof ITreeItem;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ILink $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ITreeItem ) {
			$templateData = [
				'id' => $component->getId(),
				'text' => $component->getText(),
				'title' => $component->getTitle(),
				'href' => $component->getHref(),
				'role' => $component->getRole()
			];

			$classes = $component->getClasses();
			if ( !empty( $classes ) ) {
				$templateData['class'] = implode( ' ', $classes );
			}

			$data = $component->getDataAttributes();
			if ( !empty( $data ) ) {
				$dataAttributesBuilder = new DataAttributesBuilder();
				$templateData['data'] = $dataAttributesBuilder->build( $data );
			}

			$hasPopup = $component->hasPopup();
			if ( $hasPopup ) {
				$templateData['has-popup'] = $component->hasPopup();
				$templateData['expanded'] = $component->expanded();
				$templateData['body'] = $subComponentNodes;
			}

			if ( ( $component->getRel() !== '' ) ) {
				$templateData['rel'] = $component->getRel();
			}

			// Is target external?
			$parsedUrl = wfParseUrl( $component->getHref() );
			// MediaWiki global $wgExternalLinkTarget
			if ( $parsedUrl && $this->externalLinkTarget ) {
				$templateData['target'] = $component->expanded();

				if ( isset( $templateData['rel'] ) ) {
					$componentRel = implode( ' ', $templateData['rel'] );
					$rel = array_merge( $componentRel, $this->rel );
				}
				$templateData['rel'] = implode( ' ', $rel );
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
		return $this->templateBasePath . '/tree-item.mustache';
	}
}
