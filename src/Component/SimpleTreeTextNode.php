<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeTextNode;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode;
use RawMessage;

class SimpleTreeTextNode extends ComponentBase implements ITreeNode, ITreeTextNode {

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
			'role' => 'tree-item',
			'text' => '',
			'aria' => [
				'expanded' => true
			]
		], $options );
	}

	/**
	 * @param array $options
	 * @return void
	 */
	public function setNodeOptions( array $options ): void {
		$this->options = array_merge( $this->options, $options );
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
	public function expanded(): bool {
		return $this->options['aria']['expanded'];
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

	/**
	 * @return Message
	 */
	public function getText(): Message {
		return new RawMessage( $this->options['text'] );
	}

	/**
	 * @return array
	 */
	public function getAriaAttributes(): array {
		return $this->options['aria'];
	}
}