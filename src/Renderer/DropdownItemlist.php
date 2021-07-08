<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownItemlist;

class DropdownItemlist extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IDropdownItemlist;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IDropdownItemlist $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		/** @var IComponent $component */
		if ( $component instanceof IDropdownItemlist ) {
			$templateData = [];
			if ( $component->getId() !== '' ) {
				$templateData = array_merge(
					$templateData,
					[
						'list-id' => $component->getId()
					]
				);
			}
			if ( !empty( $component->getClasses() ) ) {
				$templateData = array_merge(
					$templateData,
					[
						'list-class' => implode( ' ', $component->getClasses() )
					]
				);
			}
			if ( !empty( $component->getLinks() ) ) {
				$formatter = new Formatter();
				$templateData['links'] = $formatter->formatLinks( $component->getLinks() );
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
	public function getTemplatePathname(): string {
		return $this->templateBasePath . '/dropdown-itemlist.mustache';
	}
}
