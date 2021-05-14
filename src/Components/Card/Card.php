<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Card;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\ComponentBase;

class Card extends ComponentBase {
	/** @var string */
	protected $cardId = '';

	/** @var string */
	protected $cardClass = '';

	/** @var string */
	protected $cardcontent = '';

	/** @var string */
	protected $cardHeader = '';
	/** @var string */
	protected $cardFooter = '';

	/** @var array */
	protected $cardImage = [];

	/**
	 * @param array $config
	 */
        public function __construct( $config=[] ) {
		/**
		 * Config key 'content' can be a linklist or card-body.
		 * You need to wrap it into html like <div class="card-body">...</div>.
		 * See https://getbootstrap.com/docs/5.0/components/card/
		 */
		$this->config = $config;
        }

	/**
	 * @param array $config
	 * @return Static
	 */
        public static function factory( $config=[] ) {
                return new static( $config );
        }

        /**
         * @return string
         */
        protected function getTemplateName() {
                return 'card';
        }

        /**
         * @return string
         */
        protected function getTemplatePath() {
                return dirname( dirname( dirname( __DIR__ ) ) ) . '/resources/templates/card';
        }

        /**
         * @return array
         */
        protected function getParams() {
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
		if ( array_key_exists( 'content', $this->config ) && $this->config['content'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'content' => $this->config['content']
				]
			);
		}
		if ( array_key_exists( 'header', $this->config ) && $this->config['header'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'header' => $this->config['header']
				]
			);
		}
		if ( array_key_exists( 'footer', $this->config ) && $this->config['footer'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'footer' => $this->config['footer']
				]
			);
		}
		if ( array_key_exists( 'img-top', $this->config ) && $this->config['img-top'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'img-top' => $this->config['img-top']
				]
			);
		}
		if ( array_key_exists( 'img-bottom', $this->config ) && $this->config['img-bottom'] !== '' ) {
			$params = array_merge(
				$params,
				[
					'img-bottom' => $this->config['img-bottom']
				]
			);
		}
                return $params;
        }
}
