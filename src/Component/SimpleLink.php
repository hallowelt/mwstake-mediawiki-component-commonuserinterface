<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ILink;
use RawMessage;

class SimpleLink extends ComponentBase implements ILink {

	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'role' => '',
				'id' => 'simple-link',
				'classes' => [],
				'href' => '',
				'title' => new RawMessage( 'SimpleLink' ),
				'text' => new RawMessage( 'SimpleLink' ),
				'aria-label' => new RawMessage( 'SimpleLink' ),
				'rel' => '',
				'data' => []
			],
			$options
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->options['id'];
	}

	/**
	 * @inheritDoc
	 */
	public function getClasses(): array {
		return $this->options['classes'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRole(): string {
		return $this->options['role'];
	}

	/**
	 * @inheritDoc
	 */
	public function getText(): Message {
		return $this->options['text'];
	}

	/**
	 * @inheritDoc
	 */
	public function getTitle(): Message {
		return $this->options['title'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaLabel(): Message {
		return $this->options['aria-label'];
	}

	/**
	 * @inheritDoc
	 */
	public function getDataAttributes(): array {
		return $this->options['data'];
	}

	/**
	 * @inheritDoc
	 */
	public function getHref() : string {
		return $this->options['href'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRel() : string {
		return $this->options['rel'];
	}
}
