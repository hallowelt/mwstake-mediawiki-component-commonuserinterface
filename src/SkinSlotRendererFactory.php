<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class SkinSlotRendererFactory {

	/**
	 *
	 * @var ComponentManager
	 */
	private $componentManager = null;

	/**
	 *
	 * @var RendererDataTreeBuilder
	 */
	private $dataTreeBuilder = null;

	/**
	 *
	 * @var ComponentDataTreeRenderer
	 */
	private $treeRenderer = null;

	/**
	 *
	 * @param ComponentManager $componentManager
	 * @param RendererDataTreeBuilder $dataTreeBuilder
	 * @param ComponentDataTreeRenderer $treeRenderer
	 */
	public function __construct( $componentManager, $dataTreeBuilder, $treeRenderer ) {
		$this->componentManager = $componentManager;
		$this->dataTreeBuilder = $dataTreeBuilder;
		$this->treeRenderer = $treeRenderer;
	}

	/**
	 * @param string $slotId
	 * @return ISkinSlotRenderer
	 */
	public function create( string $slotId ) : ISkinSlotRenderer {
		$componentTree = $this->componentManager->getSkinSlotComponentTree( $slotId );
		$renderer = new GenericSkinSlotRenderer(
			$componentTree,
			$this->dataTreeBuilder,
			$this->treeRenderer
		);

		return $renderer;
	}

}
