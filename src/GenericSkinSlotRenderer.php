<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericSkinSlotRenderer extends SkinSlotRendererBase {

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
