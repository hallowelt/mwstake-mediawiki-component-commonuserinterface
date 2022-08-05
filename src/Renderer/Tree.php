<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITree;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeItem;

class Tree extends RendererBase {

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
		return $component instanceof ITree;
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
		if ( $component instanceof ITree ) {
			$templateData = [
				'id' => $component->getId(),
				'classes' => $component->getClasses()
			];

			if ( $component->getAriaLabelledBy() !== '' ) {
				$templateData['aria-labelledby'] = $component->getAriaLabelledBy();
			}

			$templateData = array_merge(
				$templateData,
				$this->processSubComponentNodes( $subComponentNodes )
			);

		} else {
			throw new Exception( "Can not extract data from " . get_class( $component ) );
		}

		return $templateData;
	}

	/**
	 * @param IComponent[] $subComponentNodes
	 * @return array
	 */
	private function processSubComponentNodes( $subComponentNodes ): array {
		$treeNodes = [];

		foreach ( $subComponentNodes as $subComponentNode ) {
			if ( $subComponentNode instanceof ITreeItem ) {
				$treeNode = $this->processTreeItem( $subComponentNode );
			} else {
				continue;
			}

			if ( $treeNode !== null ) {
				$treeNodes[] = $treeNode;
			}
		}

		return $treeNodes;
	}

	/**
	 * @param ITreeItem $treeItem
	 * @return array|null
	 */
	private function processTreeItem( ITreeItem $treeItem ): ?array {
		$templateData = [
			'id' => $treeItem->getId(),
			'text' => $treeItem->getText(),
			'title' => $treeItem->getTitle(),
			'href' => $treeItem->getHref(),
			'role' => $treeItem->getRole()
		];

		$classes = $treeItem->getClasses();
		if ( !empty( $classes ) ) {
			$templateData['class'] = implode( ' ', $classes );
		}

		$data = $treeItem->getDataAttributes();
		if ( !empty( $data ) ) {
			$dataAttributesBuilder = new DataAttributesBuilder();
			$templateData['data'] = $dataAttributesBuilder->build( $data );
		}
		$hasPopup = $treeItem->hasPopup();
		if ( $hasPopup ) {
			$templateData['has-popup'] = $treeItem->hasPopup();
			$templateData['expanded'] = $treeItem->expanded();
			$templateData['children'] = $this->processSubComponentNodes( $treeItem->getSubComponents() );
		}
		if ( ( $treeItem->getRel() !== '' ) ) {
			$templateData['rel'] = $treeItem->getRel();
		}
		// Is target external?
		$parsedUrl = wfParseUrl( $treeItem->getHref() );
		// MediaWiki global $wgExternalLinkTarget
		if ( $parsedUrl && $this->externalLinkTarget ) {
			$templateData['target'] = $treeItem->expanded();

			if ( isset( $templateData['rel'] ) ) {
				$componentRel = implode( ' ', $templateData['rel'] );
				$rel = array_merge( $componentRel, $this->rel );
			}
			$templateData['rel'] = implode( ' ', $rel );
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
