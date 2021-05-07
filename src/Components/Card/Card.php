<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Card;

use MWStake\MediaWiki\Component\CommonUserInterface\Interfaces\IComponent;
use TemplateParser;

class Card implements IComponent {
	/** @var string */
	protected $cardId = '';

	/** @var string */
	protected $cardClass = '';

	/** @var string */
	protected $cardBody = '';

	/** @var string */
	protected $cardHeader = '';
	/** @var string */
	protected $cardFooter = '';

	/** @var array */
	protected $cardImage = [];

	/**
	 * @param string $id
	 * @param string $class
	 * @param string $body
	 * @param string $header
	 * @param string $footer
	 * @param array $img
	 * @return Static
	 */
        public function __construct( $id='', $class='', $body='', $header='', $footer='', $img=[] ) {
		/**
		 * body can contain title, text, list, ...
		 * See https://getbootstrap.com/docs/5.0/components/card/
		 */
		$this->cardBody = $body;
		$this->cardClass = $class;
		$this->cardFooter = $footer;
		$this->cardHeader = $header;
		$this->cardId = $id;
		/**
		 * Image can be on top or at the bottom or both
		 * $img = [
		 * 	'top' => [
		 * 		src => '...',
		 * 		als => '...',
		 * 		href => '...' // href is optional - if set image is wrapped in an achor tag
		 * 	],
		 * 	'bottom' => [
		 * 	]
		 * ]
		 */
		$this->cardImage = $img;
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
        public static function factory( $id='', $class='', $body='', $header='', $footer='', $img=[] ) {
                return new static( $id, $class, $body, $header='', $footer='', $img=[] );
        }

        /**
         * @return string
         */
        public function getHtml() {
                $templateParser = new TemplateParser(
                        $this->getTemplatePath()
                );
                $templateParser->enableRecursivePartials( false );

                $html = $templateParser->processTemplate(
                        $this->getTemplateName(),
                        $this->getParams()
                );

                return $html;
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
		if ( $this->cardId !== '' ) {
			$params = array_merge(
				$params,
				[
					'id' => $this->cardId
				]
			);
		}
		if ( $this->cardClass !== '' ) {
			$params = array_merge(
				$params,
				[
					'class' => $this->cardClass
				]
			);
		}
		if ( $this->cardBody !== '' ) {
			$params = array_merge(
				$params,
				[
					'body' => $this->cardBody
				]
			);
		}
		if ( $this->cardHeader !== '' ) {
			$params = array_merge(
				$params,
				[
					'header' => $this->cardHeader
				]
			);
		}
		if ( $this->cardFooter !== '' ) {
			$params = array_merge(
				$params,
				[
					'footer' => $this->cardFooter
				]
			);
		}
		if ( !empty( $this->cardImage ) ) {
			$params = array_merge(
				$params,
				[
					'img' => $this->cardImage
				]
			);
		}
                return $params;
        }
}
