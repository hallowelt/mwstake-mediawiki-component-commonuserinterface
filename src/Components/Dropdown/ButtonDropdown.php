<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Dropdown;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\DropdownBase;

class ButtonDropdown extends DropdownBase {
	/**
	 * @param array $btn
	 * @param array $menu
	 */
        public function __construct( $btn=[], $menu=[] ) {
		$this->btn = $btn;
		$this->menu = $menu;
        }

	/**
	 * @param string $id
	 * @param string $class
	 * @param string $body
	 * @param string $header
	 * @param string $footer
	 * @param array $img
	 * @return Static
	 */
        public static function factory( $btn=[], $menu=[] ) {
                return new static( $btn=[], $menu=[] );
        }

        /**
         * @return string
         */
        protected function getTemplateName() {
                return 'single-button';
        }
}