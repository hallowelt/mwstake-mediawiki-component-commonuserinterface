<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Button;

use MWStake\MediaWiki\Component\CommonUserInterface\Components\Base\ComponentBase;
use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;

class Button extends ComponentBase {
	/** @var string */
	protected $id = '';

	/** @var string */
	protected $class = '';

	/** @var string */
	protected $ariaLabel = '';

	/** @var string */
	protected $text = '';

	/** @var array */
	protected $data = [];

	/**
	 * @param string $id
	 * @param string $class
	 * @param string $text
	 * @param string $ariaLabel
	 * @param array $data
	 */
        public function __construct( $text='', $ariaLabel='', $id='', $class='', $data=[] ) {
		$this->id = $id;
		$this->class = $class;
		$this->ariaLabel = $ariaLabel;
		$this->text = $text;
		$this->data = $data;
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
        public static function factory(  $text='', $ariaLabel='', $id='', $class='', $data=[] ) {
                return new static(  $text, $ariaLabel, $id, $class, $data );
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
		if ( $this->id !== '') {
			$params = array_merge(
				$params,
				[
					'id' => $this->id
				]
			);
		}
		if ( $this->class !== '') {
			$params = array_merge(
				$params,
				[
					'class' => $this->class
				]
			);
		}
		if ( $this->text !== '') {
			$params = array_merge(
				$params,
				[
					'text' => $this->text
				]
			);
		}
		if ( $this->ariaLabel !== '') {
			$params = array_merge(
				$params,
				[
					'aria-label' => $this->ariaLabel
				]
			);
		}
		if ( !empty( $this->data ) ) {
			$formatter = new Formatter();
                        $params['btn'] = array_merge(
                                $params['btn'],
                                [
                                        'data' => $formatter->makeDataAttributes( $this->data )
                                ]
                        );
		}
	}
}