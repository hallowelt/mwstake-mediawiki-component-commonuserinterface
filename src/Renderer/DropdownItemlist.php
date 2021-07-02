<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\Component\DropdownItemlist
	as DropdownItemlistComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;

class DropdownItemlist extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof DropdownItemlistComponent;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param LiteralComponent $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'list-id' => $component->getId()
		];

		$links = $component->getLinks();
		if ( !empty( $links ) ) {
			$formatter = new Formatter();
			$templateData['links'] = $formatter->formatLinks( $links );
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
