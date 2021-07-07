<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardLink;

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
	 * @return array
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		/** @var IComponent $component */
		if ( $component instanceof ICardLink ) {
			$templateData = [
				'id' => $component->getId(),
				'title' => $component->getTitle(),
				'text' => $component->getText()
			];

			$data = $component->getDataAttributes();
			if ( !empty( $data ) ) {
				$formatter = new Formatter();
				$templateData['links'] = $formatter->makeDataAttributes( $data );
			}
			$role = $component->getRole();
			if ( !empty( $role ) ) {
				$templateData['role'] = $role;
			}
			$classes = $component->getContainerClasses();
			if ( !empty( $classes ) ) {
				$templateData['class'] = implode( ' ', $classes );
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
		return $this->templateBasePath . '/card-link.mustache';
	}
}
