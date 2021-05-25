<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Exception;

class RendererFactory {

	/**
	 *
	 * @param IComponent $component
	 * @return IRenderer
	 */
	public function makeForComponent( IComponent $component ): IRenderer {
		$renderer = null;
		$componentClass = get_class( $component );

		if ( $renderer instanceof IRenderer === false ) {
			throw new Exception( "Error Processing Request" );
		}

		return $renderer;
	}

}