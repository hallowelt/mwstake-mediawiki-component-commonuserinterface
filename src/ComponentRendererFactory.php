<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal;

class ComponentRendererFactory {

	/**
	 *
	 * @var array
	 */
	private $rendererRegsitry = [];

	/**
	 *
	 * @var array
	 */
	private $componentRegistry = [];

	/**
	 *
	 * @var string
	 */
	private $rendererType = '';

	/**
	 *
	 * @param array $rendererRegsitry
	 * @param array $componentRegistry
	 * @param array $rendererType
	 */
	public function __construct( $rendererRegsitry, $componentRegistry, $rendererType ) {
		$this->rendererRegsitry = $rendererRegsitry;
		$this->componentRegistry = $componentRegistry;
		$this->componentRegistry = $rendererType;
	}

	/**
	 * Get key for use with `RendererFactory::getRenderer`
	 *
	 * @param IComponent $component
	 * @return string
	 */
	public function getKey( $component ) {
		$rendererKey = 'implement-me';
		if ( $component instanceof IPanel ) {
			$rendererKey = 'card';
		}
		if ( $component instanceof IButton ) {
			$rendererKey = 'button';
		}
		if ( $component instanceof Literal ) {
			$rendererKey = 'literal';
		}
		if ( $component instanceof IDropdownItemlist ) {
			$rendererKey = 'dropdown-itemlist';
		}
		if ( $component instanceof IDropdown ) {
			$rendererKey = 'dropdown';
		}

		return $rendererKey;
	}

	/**
	 *
	 * @param string $rendererKey
	 * @return IComponentRenderer
	 */
	public function getRenderer( $rendererKey ): IComponentRenderer {
		$renderer = null;
		if ( $rendererKey === 'card' ) {
			$renderer = new \MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Card();
		}
		if ( $rendererKey === 'button' ) {
			$renderer = new \MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Button();
		}
		if ( $rendererKey === 'literal' ) {
			$renderer = new \MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Literal();
		}
		if ( $rendererKey === 'dropdown-itemlist' ) {
			$renderer = new \MWStake\MediaWiki\Component\CommonUserInterface\Renderer\DropdownItemlist();
		}
		if ( $rendererKey === 'dropdown' ) {
			$renderer = new \MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Dropdown();
		}
		return $renderer;
	}

}
