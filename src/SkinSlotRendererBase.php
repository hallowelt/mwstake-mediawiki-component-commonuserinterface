<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

abstract class SkinSlotRendererBase implements ISkinSlotRenderer {

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
	 * @var string
	 */
	protected $slotId = '';

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
}
