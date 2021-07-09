<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IButton;
use RawMessage;

class SimpleButton extends ComponentBase implements IButton {

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
			'aria-label' => new RawMessage( 'Some aria-label' ),
			'text' => new RawMessage( 'Some text' ),
			'classes' => [],
			'disabled' => false
		], $options );
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->options['id'];
	}

	/**
	 *
	 * @return Message
	 */
	public function getAriaLabel() : Message {
		return $this->options['aria-label'];
	}

	/**
	 * @return Message
	 */
	public function getText() : Message {
		return $this->options['text'];
	}

	/**
	 * @inheritDoc
	 */
	public function getClasses(): array {
		return $this->options['classes'];
	}

	/**
	 *
	 * @return bool
	 */
	public function isDisabled() : bool {
		return $this->options['disabled'];
	}
}
