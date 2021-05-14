<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\LinklistGroup;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\ComponentBase;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;

class LinklistGroup extends ComponentBase {
	/** @var array */
	protected $links = [];

	/** @var boolean */
	protected $format = true;

	/**
	 * @param array $links
	 * @param boolean $format
	 */
        public function __construct( $links=[], $format=true ) {
		$this->links = $links;
		$this->format = $format;
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
        public static function factory( $links=[], $format=true ) {
                return new static( $links, $format );
        }

        /**
         * @return string
         */
        protected function getTemplateName() {
                return 'linklist-group';
        }

        /**
         * @return string
         */
        protected function getTemplatePath() {
                return dirname( dirname( dirname( __DIR__ ) ) ) . '/resources/templates/linklist';
        }

        /**
         * @return array
         */
        protected function getParams() {
		if ( $this->format === true ) {
			$formatter = new Formatter();
                        $params = [
                                'links' => $formatter->formatLinks( $this->links )
                        ];
                } else {
                        $params = [
                                'links' => $this->links
                        ];
                }

		if ( empty( $params ) ) {
			return '';
		}

                return $params;
        }
}
