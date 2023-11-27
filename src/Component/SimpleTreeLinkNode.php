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
			'expanded' => false,
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
	public function getSubComponents(): array {
		return $this->options['items'];
	}

	/**
	 * @return Message
	 */
	public function getText(): Message {
		$msg = Message::newFromKey( $this->options['text'] );
		if ( $msg->exists() ) {
			return $msg;
		}
		return new RawMessage( $this->options['text'] );
	}

	/**
	 * @return Message
	 */
	public function getTitle(): Message {
		$msg = Message::newFromKey( $this->options['title'] );
		if ( $msg->exists() ) {
			return $msg;
		}
		return new RawMessage( $this->options['title'] );
	}

	/**
	 * @return string
	 */
	public function getHref(): string {
		return $this->options['href'];
	}
}
