<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericComponentRenderer {

	/**
	 *
	 * @var ComponentManager
	 */
	protected $componentManager = [];

	/**
	 *
	 * @var RendererDataTreeBuilder
	 */
	protected $rendererDataTreeBuilder = null;

	/**
	 *
	 * @var ComponentDataTreeRenderer
	 */
	protected $componentDataTreeRenderer = null;

	/**
	 *
	 * @param ComponentManager $componentManager
	 * @param RendererDataTreeBuilder $rendererDataTreeBuilder
	 * @param ComponentDataTreeRenderer $componentDataTreeRenderer
	 */
	public function __construct( $componentManager, $rendererDataTreeBuilder,
	$componentDataTreeRenderer ) {
		$this->componentManager = $componentManager;
		$this->rendererDataTreeBuilder = $rendererDataTreeBuilder;
		$this->componentDataTreeRenderer = $componentDataTreeRenderer;
	}

	/**
	 *
	 * @param IComponent $component
	 * @return string
	 */
	public function getHtml( $component ) : string {
		$componentTree = $this->componentManager->getCustomComponentTree( $component );
		$rendererDataTree = $this->rendererDataTreeBuilder->getRendererDataTree( $componentTree );
		return $this->componentDataTreeRenderer->getHtml( $rendererDataTree );
	}

}
