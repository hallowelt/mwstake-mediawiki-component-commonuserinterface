<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Dropdown;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\DropdownBase;

class AnchorDropdown extends DropdownBase {
	/** @var array */
	protected $btn = [];

	/** @var array */
	protected $menu = [];

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
                return 'single-anchor';
        }

	        /**
         * @return array
         */
        public function getParams() {
                $params = parent::getParams();

		if ( array_key_exists( 'title', $this->btn ) && !empty( $this->btn['title'] ) ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'title' => $this->btn['title']
                                ]
                        );
		}

                return $params;
        }
}