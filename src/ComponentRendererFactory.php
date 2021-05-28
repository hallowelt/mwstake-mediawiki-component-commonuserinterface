<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Exception;

class ComponentRendererFactory {

	/**
	 *
	 * @param IComponent $component
	 * @return IComponentRenderer
	 */
	public function makeForComponent( IComponent $component ): IComponentRenderer {
		$renderer = null;
		$componentClass = get_class( $component );

		if ( $renderer instanceof IComponentRenderer === false ) {
			throw new Exception( "Error Processing Request" );
		}

		return $renderer;
	}

}
