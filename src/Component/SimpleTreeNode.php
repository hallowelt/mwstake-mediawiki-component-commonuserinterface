<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode;

class SimpleTreeNode extends ComponentBase implements ITreeNode {

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
			'expanded' => false,
			'role' => ''
		], $options );
	}

	/**
	 * @param array $data
	 * @return void
	 */
	public function setNodeData( array $data ): void {
		$this->options = array_merge( $this->options, $data );
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
		if ( empty( $this->getSubComponents() ) ) {
			return false;
		}

		return true;
	}

	/**
	 * @return bool
	 */
	public function expanded(): bool {
		return $this->options['expanded'];
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
	 *
	 * @inheritDoc
	 */
	public function getSubComponents() : array {
		return $this->options['items'];
	}
}
