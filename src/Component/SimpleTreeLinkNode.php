<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeLinkNode;
use MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode;
use RawMessage;

class SimpleTreeLinkNode extends ComponentBase implements ITreeNode, ITreeLinkNode {

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
			'title' => '',
			'href' => '',
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
	public function isExpanded(): bool {
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
	 * @return Message
	 */
	public function getTitle(): Message {
		return new RawMessage( $this->options['title'] );
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
	public function getAriaAttributes(): array {
		return $this->options['aria'];
	}
}
