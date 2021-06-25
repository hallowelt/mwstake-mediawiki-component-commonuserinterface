<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class ComponentDataTreeRenderer {

	/**
	 *
	 * @var ComponentRendererFactory
	 */
	private $rendererFactory = null;

	public function __construct( $rendererFactory ) {
		$this->rendererFactory = $rendererFactory;
	}

	/**
	 *
	 * @param array $rendererDataTree Data tree as created by `RendererDataTreeBuilder::getRendererDataTree`
	 * @return string The finished HTML
	 */
	public function getHtml( $rendererDataTreeNodes ) {
		$html = '';
		foreach ( $rendererDataTreeNodes as $rendererDataTreeNode ) {
			$html .= $this->makeHtmlFromRendererDataTreeNode( $rendererDataTreeNode );
		}
		return $html;
	}

	private function makeHtmlFromRendererDataTreeNode( $dataTreeNode ) {
		$html = '';
		$renderKey = $dataTreeNode['renderer'];
		$renderer = $this->rendererFactory->getRenderer( $renderKey );
		foreach( $dataTreeNode['data'] as $dataKey => $dataValue ) {
			if ( !is_array( $dataValue ) ) {
				continue;
			}
			$subComponentHtml = '';
			foreach ( $dataValue as $index => $item ) {
				if ( isset( $item['renderer'] ) ) {
					$subComponentHtml .= $this->makeHtmlFromRendererDataTreeNode( $item );
				}
			}
			$dataTreeNode['data'][$dataKey] = $subComponentHtml;
		}

		$html = $renderer->getHtml( $dataTreeNode['data'] );
		return $html;
	}

}