<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Component\Base;

use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use TemplateParser;

class DropdownRendererBase extends ComponentRendererBase {
	/** @var array */
	protected $btn = [];

	/** @var array */
	protected $menu = [];

        /**
         * @return string
         */
        protected function getTemplatePath() {
                return dirname( dirname( dirname( dirname( __DIR__ ) ) ) ) . '/resources/templates/dropdown';
        }

        /**
         * @return array
         */
        public function getParams() {
                $params = [
			'btn' => [],
			'menu' => []
		];

		if ( array_key_exists( 'id', $this->btn ) && $this->btn['id'] !== '' ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
                                        'id' => $this->btn['id']
                                ]
                        );
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
                                        'id' => $this->btn['id']
                                ]
                        );
		}
		if ( array_key_exists( 'class', $this->btn ) && $this->btn['class'] !== '' ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
                                        'class' => $this->btn['class']
                                ]
                        );
		}
		if ( array_key_exists( 'title', $this->btn ) && $this->btn['title'] !== '' ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'title' => $this->btn['title']
                                ]
                        );
		}
		if ( array_key_exists( 'aria-label', $this->btn ) && $this->btn['aria-label'] !== '' ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'aria-label' => $this->btn['aria-label']
                                ]
                        );
		}
		if ( array_key_exists( 'text', $this->btn ) && $this->btn['text'] !== '' ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'text' => $this->btn['text']
                                ]
                        );
		}
		if ( array_key_exists( 'data', $this->btn ) && !empty( $this->btn['data'] ) ) {
			$formatter = new Formatter();
                        $params['btn'] = array_merge(
                                $params['btn'],
                                [
                                        'data' => $formatter->makeDataAttributes( $this->btn['data'] )
                                ]
                        );
		}
		if ( array_key_exists( 'class', $this->menu ) && $this->menu['class'] !== '' ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'class' => $this->menu['class']
                                ]
                        );
		}
		if ( array_key_exists( 'desc', $this->menu ) && $this->menu['desc'] !== '' ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'desc' => $this->menu['desc']
                                ]
                        );
		}
		if ( array_key_exists( 'body', $this->menu ) && $this->menu['body'] !== '' ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'body' => $this->menu['body']
                                ]
                        );
		}

                return $params;
        }
}