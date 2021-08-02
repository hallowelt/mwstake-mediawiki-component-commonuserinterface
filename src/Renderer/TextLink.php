<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\AriaAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\DataAttributesBuilder;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ITextLink;

class TextLink extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof ITextLink;
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
		if ( $component instanceof ITextLink ) {
			$templateData = [
				'id' => $component->getId(),
				'title' => $component->getTitle()->text(),
				'href' => $component->getHref(),
				'body' => $component->getText()->text()
			];
			$data = $component->getDataAttributes();
			if ( !empty( $data ) ) {
				$dataAttributesBuilder = new DataAttributesBuilder();
				$templateData['data'] = $dataAttributesBuilder->build( $data );
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
			$aria = [
				'label' => $component->getAriaLabel()->text()
			];
			$ariaAttributesBuilder = new AriaAttributesBuilder();
			$templateData = array_merge(
				$templateData,
				[
					'aria' => $ariaAttributesBuilder->toString( $aria )
				]
			);
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
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/link.mustache';
	}
}