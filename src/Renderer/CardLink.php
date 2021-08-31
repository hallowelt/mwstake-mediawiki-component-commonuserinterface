<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardLink;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class CardLink extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ICardLink;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param ICardLink $component
	 * @param array $subComponentNodes
	 * @param array $data
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes, $data ) : array {
		$templateData = [];

		/** @var IComponent $component */
		if ( $component instanceof ICardLink ) {
			$templateData = [
				'id' => $component->getId(),
				'title' => $component->getTitle()->text(),
				'text' => $component->getText()->text(),
				'aria-label' => $component->getAriaLabel()->text(),
				'href' => $component->getHref()
			];
			$data = $component->getDataAttributes();
			if ( !empty( $data ) ) {
				$dataAttributesBuilder = new DataAttributesBuilder();
				$templateData['data'] = $dataAttributesBuilder->toString( $data );
			}
			$role = $component->getRole();
			if ( !empty( $role ) ) {
				$templateData['role'] = $role;
			}
			if ( !empty( $component->getClasses() ) ) {
				$templateData['class'] = implode( ' ', $component->getClasses() );
			}
			if ( ( $component->getRel() !== '' ) ) {
				$templateData['rel'] = $component->getRel();
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
		return $this->templateBasePath . '/card-link.mustache';
	}
}
