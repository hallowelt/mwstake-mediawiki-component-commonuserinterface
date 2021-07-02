<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use TemplateParser;

class Formatter {
	/**
	 * @return StdClass
	 */
	public static function factory() {
		return new static();
	}

	/**
	 * @param string $text
	 * @return string
	 */
	private function checkForMessage( $text ) : string {
		$msg = wfMessage( $text );

		if ( !$msg->exists() ) {
			return $text;
		}

		return $msg->text();
	}

	/**
	 * @param array $links
	 * @return array
	 */
	public function formatLinks( $links ) : array {
		$params = [];

		foreach ( $links as $key => $link ) {
			if ( !isset( $link['text'] ) || $link['text'] === '' ) {
				continue;
			}

			$link['text'] = $this->checkForMessage( $link['text'] );

			if ( isset( $link['title'] ) && $link['title'] !== '' ) {
				$link['title'] = $this->checkForMessage( $link['title'] );
			} elseif ( is_string( $key ) ) {
				$link['title'] = $this->checkForMessage( $key );
			} else {
				$link['title'] = $link['text'];
			}

			$params[] = $link;
		}

		return $params;
}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeDataAttributes( $data ) : array {
		$attribs = [];

		foreach ( $data  as $key => $value ) {
			$attrib = 'data-' . $key . '="' . $value . '"';
			array_push( $attribs, $attrib );
		}

		return $attribs;
	}
}
