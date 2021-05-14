<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Dropdown;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\DropdownBase;

class AnchorDropdown extends DropdownBase {
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