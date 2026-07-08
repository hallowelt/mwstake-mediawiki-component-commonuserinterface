<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use MediaWiki\Linker\Linker;
use MediaWiki\Message\Message;
use MWStake\MediaWiki\Component\Utils\MessageHelper;

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
	 * @var MessageHelper|null
	 */
	private $messageHelper = null;

	/**
	 * Cache for resolved message text, keyed by message key.
	 * Avoids redundant Message::newFromKey() instantiations for the same key.
	 *
	 * @var array [ key => string|false ]
	 */
	private $messageCache = [];

	/**
	 * See:
	 * https://www.mediawiki.org/wiki/Manual:$wgExternalLinkTarget
	 * https://www.mediawiki.org/wiki/Manual:$wgNoFollowLinks
	 *
	 * @param string|bool $externalLinkTarget
	 * @param bool $noFollowLinks
	 * @param MessageHelper|null $messageHelper
	 */
	public function __construct( $externalLinkTarget = false, $noFollowLinks = true,
		?MessageHelper $messageHelper = null
	) {
		$this->externalLinkTarget = $externalLinkTarget;
		$this->noFollowLinks = $noFollowLinks;
		$this->messageHelper = $messageHelper;
	}

	/**
	 * Check if a message key exists, using MessageHelper for fast lookup.
	 *
	 * @param string $key
	 * @return bool
	 */
	private function messageExists( string $key ): bool {
		if ( !isset( $this->messageCache[$key] ) ) {
			if ( $this->messageHelper ) {
				$exists = $this->messageHelper->msgExistsQuick( $key );
			} else {
				$exists = Message::newFromKey( $key )->exists();
			}
			$this->messageCache[$key] = $exists ? null : false;
		}
		return $this->messageCache[$key] !== false;
	}

	/**
	 * Get the text of a message key, with caching.
	 *
	 * @param string $key
	 * @return string
	 */
	private function messageText( string $key ): string {
		if ( !isset( $this->messageCache[$key] ) || $this->messageCache[$key] === null ) {
			$this->messageCache[$key] = Message::newFromKey( $key )->text();
		}
		return $this->messageCache[$key];
	}

	/**
	 * @param array $links
	 * @return array
	 */
	public function formatLinks( $links ): array {
		$params = [];

		foreach ( $links as $key => $link ) {
			if ( is_string( $key ) ) {
				$strpos = strpos( $key, '-' );
				$subKey = substr( $key, $strpos + 1 );
			}

			if ( isset( $link['text'] ) && $link['text'] !== '' ) {
				if ( $this->messageExists( $link['text'] ) ) {
					$link['text'] = $this->messageText( $link['text'] );
				}
			} elseif ( isset( $link['msg'] ) && $link['msg'] === '' ) {
				if ( $this->messageExists( $link['msg'] ) ) {
					$link['text'] = $this->messageText( $link['msg'] );
				}
			} elseif ( is_string( $key ) && $this->messageExists( $key ) ) {
				$link['text'] = $this->messageText( $key );
			} elseif ( is_string( $key ) && $this->messageExists( $subKey ) ) {
				$link['text'] = $this->messageText( $subKey );
			} else {
				continue;
			}

			if ( isset( $link['title'] ) && $link['title'] !== '' ) {
				if ( $this->messageExists( $link['title'] ) ) {
					$link['title'] = $this->messageText( $link['title'] );
				}
			} elseif ( is_string( $key ) && $this->messageExists( $key ) ) {
				$link['title'] = $this->messageText( $key );
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
