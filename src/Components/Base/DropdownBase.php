<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Base;

use MWStake\MediaWiki\Component\CommonUserInterface\Formatter;
use TemplateParser;

class DropdownBase extends ComponentBase {
	/**
	 * @param array $links
         * @param bool $format
	 * @return string
	 */
	public function makeDropdownItemList( $links, $format=true ) {
		if ($this->format === true) {
			$formatter = new Formatter();
			$params = [
				'links' => $formatter->formatLinks($this->links)
			];
		} else {
			$params = [
				'links' => $this->links
			];
		}

		if ( empty( $params ) ) {
			return '';
		}

                $templateParser = new TemplateParser(
			dirname( dirname( dirname( __DIR__ ) ) ) . '/resources/templates/dropdown'
		);
		$templateParser->enableRecursivePartials( false );

		$html = $templateParser->processTemplate(
			'item-list',
			$params
		);

		return $html;
	}

        /**
         * @return array
         */
        public function getParams() {
                $params = [];
		if ( array_key_exists( 'id', $this->btn ) && !empty( $this->btn['id'] ) ) {
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
		if ( array_key_exists( 'class', $this->btn ) && !empty( $this->btn['class'] ) ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
                                        'class' => $this->btn['class']
                                ]
                        );
		}
		if ( array_key_exists( 'title', $this->btn ) && !empty( $this->btn['title'] ) ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'title' => $this->btn['title']
                                ]
                        );
		}
		if ( array_key_exists( 'aria-label', $this->btn ) && !empty( $this->btn['aria-label'] ) ) {
			$params['btn'] = array_merge(
                                $params['btn'],
                                [
					'aria-label' => $this->btn['aria-label']
                                ]
                        );
		}
		if ( array_key_exists( 'text', $this->btn ) && !empty( $this->btn['text'] ) ) {
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
		if ( array_key_exists( 'class', $this->menu ) && !empty( $this->menu['class'] ) ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'text' => $this->btn['class']
                                ]
                        );
		}
		if ( array_key_exists( 'aria-label', $this->menu ) && !empty( $this->menu['aria-label'] ) ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'aria-label' => $this->btn['aria-label']
                                ]
                        );
		}
		if ( array_key_exists( 'desc', $this->menu ) && !empty( $this->menu['desc'] ) ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'desc' => $this->btn['desc']
                                ]
                        );
		}
		if ( array_key_exists( 'body', $this->menu ) && !empty( $this->menu['body'] ) ) {
			$params['menu'] = array_merge(
                                $params['menu'],
                                [
					'body' => $this->btn['body']
                                ]
                        );
		}

                return $params;
        }

}