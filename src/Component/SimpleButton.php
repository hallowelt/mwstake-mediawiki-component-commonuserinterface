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
			'label' => new RawMessage( 'Some label' ),
			'tooltip' => new RawMessage( 'Some tooltip' ),
			'type' => IButton::TYPE_SECONDARY,
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
	public function getLabel() : Message {
		return $this->options['label'];
	}

	/**
	 * One of the `IButton::TYPE_*` values
	 *
	 * @return string
	 */
	public function getType() : string {
		return $this->options['type'];
	}

	/**
	 * @return Message
	 */
	public function getTooltip() : Message {
		return $this->options['tooltip'];
	}

	/**
	 *
	 * @return boolean
	 */
	public function isDisabled() : bool {
		return $this->options['disabled'];
	}
}