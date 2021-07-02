<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericSkinSlotRenderer implements ISkinSlotRenderer {

	/**
	 *
	 * @var ComponentManager
	 */
	private $componentManager = [];

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

	/**
	 *
	 * @var string
	 */
	private $slotId = '';

	/**
	 *
	 * @param ComponentManager $componentManager
	 * @param RendererDataTreeBuilder $rendererDataTreeBuilder
	 * @param ComponentDataTreeRenderer $componentDataTreeRenderer
	 * @param string $slotId
	 */
	public function __construct( $componentManager, $rendererDataTreeBuilder,
	$componentDataTreeRenderer, $slotId ) {
		$this->componentManager = $componentManager;
		$this->rendererDataTreeBuilder = $rendererDataTreeBuilder;
		$this->componentDataTreeRenderer = $componentDataTreeRenderer;
		$this->slotId = $slotId;
	}

	/**
	 *
	 * @return string
	 */
	public function getHtml() : string {
		$componentTree = $this->componentManager->getSkinSlotComponentTree( $this->slotId );
		$rendererDataTree = $this->rendererDataTreeBuilder->getRendererDataTree( $componentTree );
		$html = $this->componentDataTreeRenderer->getHtml( $rendererDataTree );

		return $html;
	}

}
