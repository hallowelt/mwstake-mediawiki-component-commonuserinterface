<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericSkinSlotRenderer implements ISkinSlotRenderer {

	/**
	 *
	 * @var array
	 */
	private $componentTree = [];

	/**
	 *
	 * @var RendererDataTreeBuilder
	 */
	private $rendererDataTreeBuilder = null;

	/**
	 *
	 * @var ComponentDataTreeRenderer
	 */
	private $componentDataTreeRenderer = null;

	public function __construct( $componentTree, $rendererDataTreeBuilder, $componentDataTreeRenderer ) {
		$this->componentTree = $componentTree;
		$this->rendererDataTreeBuilder = $rendererDataTreeBuilder;
		$this->componentDataTreeRenderer = $componentDataTreeRenderer;
	}

	/**
	 *
	 * @return string
	 */
	public function getHtml() : string {
		$rendererDataTree = $this->rendererDataTreeBuilder->getRendererDataTree(
			$this->componentTree
		);

		$html = $this->componentDataTreeRenderer->getHtml( $rendererDataTree );

		return $html;
	}

}
