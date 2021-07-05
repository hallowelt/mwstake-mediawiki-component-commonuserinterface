<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ILink;

class SimpleLink extends ComponentBase implements ILink {
	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => '',
				'classes' => [],
				'data' => [],
				'role' => '',
				'rel' => []
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
	public function getHref() : string {
		return $this->options['id'];
	}

	/**
	 * @inheritDoc
	 */
	public function getText() : Message {
		return $this->options['text'];
	}

	/**
	 * @inheritDoc
	 */
	public function getTitle() : Message {
		return $this->options['title'];
	}

	/**
	 * @inheritDoc
	 */
	public function getClasses() : array {
		return $this->options['classes'];
	}

	/**
	 * @inheritDoc
	 */
	public function getDataAttributes() : array {
		return $this->options['data'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRole() : string {
		return $this->options['role'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRel() : string {
		return $this->options['rel'];
	}
}
