<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\Linker\Linker;
use MediaWiki\Message\Message;

class LinkFormatter {

	/**
	 *
	 * @var string|bool
	 */
	private $externalLinkTarget = false;

	/**
	 *
	 * @var bool
	 */
	private $noFollowLinks = true;

	/**
	 * See:
	 * https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
	 * https://www.mediawiki.org/wiki/Manual:$wgNoFollowLinks
	 *
	 * @param string|bool $externalLinkTarget
	 * @param bool $noFollowLinks
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
	public function formatLinks( $links ): array {
		$params = [];

		foreach ( $links as $key => $link ) {
			if ( isset( $link['text'] ) && $link['text'] !== '' ) {
				$link['text'] = Message::newFromKey( $link['text'] )->text();
			} elseif ( isset( $link['msg'] ) && $link['msg'] !== '' ) {
				$link['text'] = Message::newFromKey( $link['msg'] )->text();
			} elseif ( is_string( $key ) ) {
				$link['text'] = Message::newFromKey( $key )->text();
			} else {
				continue;
			}

			if ( isset( $link['title'] ) && $link['title'] !== '' ) {
				$link['title'] = Message::newFromKey( $link['title'] )->text();
			} elseif ( is_string( $key ) ) {
				$link['title'] = Message::newFromKey( $key )->text();
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
			if ( $this->noFollowLinks && !in_array( 'nofollow', $rel ) ) {
				$rel = array_merge( $rel, [ 'nofollow' ] );
			}
			$validHref = isset( $link['href'] )
				&& ( $link['href'] !== '' )
				&& ( strpos( $link['href'], '#' ) !== 0 );
			if ( $validHref ) {
				$parsedUrl = wfParseUrl( $link['href'] );
				if ( $parsedUrl && $this->externalLinkTarget ) {
					if ( !isset( $link['target'] ) ) {
						$link['target'] = $this->externalLinkTarget;
					}
					// See https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
					if ( isset( $link['target'] ) && !in_array( 'noreferrer', $rel ) ) {
						$rel = array_merge( $rel, [ 'noreferrer' ] );
					}
					if ( isset( $link['target'] ) && !in_array( 'noopener', $rel ) ) {
						$rel = array_merge( $rel, [ 'noopener' ] );
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
