<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeItem;
use RawMessage;

class SimpleTreeItem extends ComponentBase implements ITreeItem {

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
		$this->options = array_merge( [
			'id' => 'some-id',
			'classes' => [],
			'has-popup' => false,
			'expanded' => false,
			'text' => new RawMessage( 'SomeText' ),
			'title' => new RawMessage( 'Some title' ),
			'href' => '',
			'data' => [],
			'role' => '',
			'rel' => '',
		], $options );
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->options['id'];
	}

	/**
	 * @return string[]
	 */
	public function getClasses(): array {
		return $this->options['classes'];
	}

	/**
	 * @return bool
	 */
	public function hasPopup(): bool {
		return $this->options['has-popup'];
	}

	/**
	 * @return bool
	 */
	public function expanded(): bool {
		return $this->options['expanded'];
	}

	/**
	 * @return Message
	 */
	public function getText(): Message {
		return $this->options['text'];
	}

	/**
	 * @return Message
	 */
	public function getTitle(): Message {
		return $this->options['title'];
	}

	/**
	 * @return string
	 */
	public function getHref(): string {
		return $this->options['href'];
	}

	/**
	 * @return array
	 */
	public function getDataAttributes(): array {
		return $this->options['data'];
	}

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole(): string {
		return $this->options['role'];
	}

	/**
	 * @return string
	 */
	public function getRel(): string {
		return $this->options['rel'];
	}
}
