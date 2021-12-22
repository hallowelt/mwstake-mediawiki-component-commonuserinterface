<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Linker;
use Message;

class LinkFormatter {

	/**
	 *
	 * @var string|boolean
	 */
	private $externalLinkTarget = false;

	/**
	 *
	 * @var boolean
	 */
	private $noFollowLinks = true;

	/**
	 * See:
	 * https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
	 * https://www.mediawiki.org/wiki/Manual:$wgNoFollowLinks
	 *
	 * @param string|false $externalLinkTarget
	 * @return LinkFormatter
	 */
	public function __construct( $externalLinkTarget = false, $noFollowLinks = true ) {
		$this->externalLinkTarget = $externalLinkTarget;
		$this->noFollowLinks = $noFollowLinks;
	}

	/**
	 * @param array $links
	 * @return array
	 */
	public function formatLinks( $links ) : array {
		$params = [];

		foreach ( $links as $key => $link ) {
			if ( is_string( $key ) ) {
				$strpos = strpos( $key, '-' );
				$subKey = substr( $key, $strpos + 1 );
			}

			if ( isset( $link['text'] ) && $link['text'] !== '' ) {
				$msg = Message::newFromKey( $link['text'] );
				if ( $msg->exists() ) {
					$link['text'] = $msg->text();
				}
			} elseif ( isset( $link['msg'] ) && $link['msg'] === '' ) {
				$msg = Message::newFromKey( $link['msg'] );
				if ( $msg->exists() ) {
					$link['text'] = $msg->text();
				}
			} elseif ( is_string( $key ) && Message::newFromKey( $key )->exists() ) {
				$msg = Message::newFromKey( $key );
				$link['text'] = $msg->text();
			} elseif ( is_string( $key ) && Message::newFromKey( $subKey )->exists() ) {
				$msg = Message::newFromKey( $subKey );
				$link['text'] = $msg->text();
			} else {
				continue;
			}

			if ( isset( $link['title'] ) && $link['title'] !== '' ) {
				$msg = Message::newFromKey( $link['title'] );
				if ( $msg->exists() ) {
					$link['title'] = $msg->text();
				}
			} elseif ( is_string( $key ) && Message::newFromKey( $key )->exists() ) {
				$msg = Message::newFromKey( $key );
				if ( $msg->exists() ) {
					$link['title'] = $msg->text();
				}
			} elseif ( isset( $link['id'] ) && $link['id'] !== '' ) {
				$tooltip = Linker::titleAttrib( $link['id'] );
				if ( $tooltip ) {
					$link['title'] = $tooltip;
				}
			}

			if ( isset( $link['class'] ) && is_array( $link['class'] ) ) {
				$link['class'] = implode( ' ', $link['class'] );
			}

			if ( isset( $link['data-mw'] ) && isset( $link['data'] ) ) {
				$link['data']['mw'] = $link['data-mw'];
			} elseif ( isset( $link['data-mw'] ) ) {
				$link['data'] = [
					'mw' => $link['data-mw']
				];
			}

			// Is target external?
			$rel = [];
			if ( isset( $link['rel'] ) ) {
				$rel = explode( ' ', $link['rel'] );
			}
			if ( $this->noFollowLinks ) {
				$rel[] = 'nofollow';
			}
			if ( isset( $link['href'] ) && ( $link['href'] !== '' ) && ( strpos( $link['href'], '#' ) !== 0 ) ) {
				$parsedUrl = wfParseUrl( $link['href'] );
				if ( $parsedUrl && $this->externalLinkTarget ) {
					if ( !isset( $link['target'] ) ) {
						$link['target'] = $this->externalLinkTarget;
					}
					if ( isset( $link['target'] ) && !isset( $link['rel'] ) ) {
						// See https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
						$rel = array_merge(
							$rel,
							[ 'noreferrer', 'noopener' ]
						);
					}
				}
			}
			if ( !empty( $rel ) ) {
				$link['rel'] = implode( ' ', $rel );
			}

			$params[] = $link;
		}

		return $params;
	}
}
