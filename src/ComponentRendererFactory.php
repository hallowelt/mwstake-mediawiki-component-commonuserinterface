<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

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

	}

	/**
	 *
	 * @param string $rendererKey
	 * @return IComponentRenderer
	 */
	public function getRenderer( $rendererKey ): IComponentRenderer {

	}

}
