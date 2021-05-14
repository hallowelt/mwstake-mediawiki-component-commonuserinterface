<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Button;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\ComponentBase;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;

class Button extends ComponentBase {
	/** @var array */
	protected $config = [];

	/**
	 * @param array $config
	 */
        public function __construct( $config=[] ) {
		$this->config = $config;
        }

	/**
	 * @param array $config
	 * @return Static
	 */
        public static function factory(  $config=[] ) {
                return new static(  $config );
        }

        /**
         * @return string
         */
        protected function getTemplateName() {
                return 'single-button';
        }

        /**
         * @return string
         */
        protected function getTemplatePath() {
                return dirname( dirname( dirname( __DIR__ ) ) ) . '/resources/templates/button';
        }

        /**
         * @return array
         */
        public function getParams() {
		$params = [];
		if ( array_key_exists( 'id', $this->config ) && $this->config['id'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'id' => $this->config['id']
				]
			);
		}
		if ( array_key_exists( 'class', $this->config ) && $this->config['class'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'class' => $this->config['class']
				]
			);
		}
		if ( array_key_exists( 'text', $this->config ) && $this->config['text'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'text' => $this->config['text']
				]
			);
		}
		if ( array_key_exists( 'aria-label', $this->config ) && $this->config['aria-label'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'aria-label' => $this->config['aria-label']
				]
			);
		}
		if ( array_key_exists( 'data', $this->config ) && $this->config['data'] !== '' ) {
			$formatter = new Formatter();
                        $params = array_merge(
                                $params,
                                [
                                        'data' => $formatter->makeDataAttributes( $this->config['data'] )
                                ]
                        );
		}
	}
}