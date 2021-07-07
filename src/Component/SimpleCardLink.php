<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ICardLink;
use RawMessage;

class SimpleCardLink extends ComponentBase implements ICardLink {
	/**
	 *
	 * @var array
	 */
	private $options = [];

	/**
	 *
	 * @param string $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'role' => '',
				'id' => '',
				'classes' => [],
				'href' => '',
				'title' => new RawMessage( 'SimpleCardLink' ),
				'text' => new RawMessage( 'SimpleCardLink' ),
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
	public function getContainerClasses(): array {
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
	public function getDataAttributes(): array {
		return $this->options['data'];
	}

	/**
	 * @inheritDoc
	 */
	public function getUrl() : string {
		return $this->options['href'];
	}
}
