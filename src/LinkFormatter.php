<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class LinkFormatter {
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

			if ( isset( $link['data'] ) && !empty( $link['data'] ) ) {
				$dataAttributesBuilder = new DataAttributesBuilder();
				$link['data'] = $dataAttributesBuilder->build( $link['data'] );
			}

			$params[] = $link;
		}

		return $params;
 }
}
