<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IRenderer {

	/**
	 *
	 * @param object $object Must implement a component interface that has
	 * a renderer registered in `$mwsgCommonUIComponentRendererRegistry`
	 * @return string
	 */
	public function getHtml( $object ) : string;
}