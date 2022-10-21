<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ITree;

class SimpleTree extends ComponentBase implements ITree {

	/**
	 *
	 * @var array
	 */
	private $options = [];

	/**
	 * @param array $options
	 */
	public function __construct( array $options = [] ) {
		$this->options = array_merge( [
			'id' => 'some-id',
			'items' => [],
			'classes' => [],
			'role' => 'tree',
			'aria' => []
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
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getRole(): string {
		return $this->options['role'];
	}

	/**
	 * @return array
	 */
	public function getAriaAttributes(): array {
		return $this->options['aria'];
	}
}
