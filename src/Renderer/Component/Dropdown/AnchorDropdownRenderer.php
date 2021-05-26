<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Component\Dropdown;

use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Component\Base\DropdownRendererBase;

class AnchorDropdownRenderer extends DropdownRendererBase {
	/**
	 * @param array $btn
	 * @param array $menu
	 */
        public function __construct( $btn=[], $menu=[] ) {
		$this->btn = $btn;
		$this->menu = $menu;
        }

	/**
	 * @param array $btn
	 * @param array $menu
	 * @return Static
	 */
        public static function factory( $btn=[], $menu=[] ) {
                return new static( $btn=[], $menu=[] );
        }

        /**
         * @return string
         */
        protected function getTemplateName() {
                return 'single-anchor';
        }
}