<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ITree;
use RawMessage;

class SimpleTree extends ComponentBase implements ITree {

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
			'aria-labelledby' => 'some parent id'
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
	 * @return Message
	 */
	public function getAriaLabelledBy(): string {
		return $this->options['aria-labelledby'];
	}
}