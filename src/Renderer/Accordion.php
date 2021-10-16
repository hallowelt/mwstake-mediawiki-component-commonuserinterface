<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Generic;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\IAccordion;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\RendererBase;

class Accordion extends RendererBase {

	/**
	 *
	 * @param IComponent $component
	 * @return bool
	 */
	public function canRender( IComponent $component ) : bool {
		return $component instanceof IAccordion;
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @param IAccordion $component
	 * @param array $subComponentNodes
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		return [
			'id' => $component->getId(),
			'items' => $component->getLabel()->plain()
		];
	}

	/**
	 * Having this public should enable client-side rendering
	 *
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . '/accordion.mustache';
	}

}
