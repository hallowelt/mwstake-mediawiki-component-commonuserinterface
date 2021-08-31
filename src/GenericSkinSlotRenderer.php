<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericSkinSlotRenderer extends SkinSlotRendererBase {

	/**
	 * @param array $data
	 * @return string
	 */
	public function getHtml( $data ) : string {
		$componentTree = $this->componentManager->getSkinSlotComponentTree( $this->slotId );
		$rendererDataTree = $this->rendererDataTreeBuilder->getRendererDataTree( $componentTree, $data );
		$html = $this->componentDataTreeRenderer->getHtml( $rendererDataTree );

		return $html;
	}

}
