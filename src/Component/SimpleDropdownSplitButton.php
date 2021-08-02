<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownSplitButton;
use RawMessage;

class SimpleDropdownSplitButton extends ComponentBase implements IDropdownSplitButton {
	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => 'simple-dropdown-split-button',
				'button-text' => new RawMessage( 'SimpleSplitButton' ),
				'button-title' => new RawMessage( 'SimpleSplitButton' ),
				'button-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'split-button-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'button-group-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'button-group-role' => 'button',
				'button-disabled' => false,
				'split-button-disabled' => false,
				'items' => [],
				'container-classes' => [],
				'button-group-classes' => [],
				'button-classes' => [],
				'split-button-classes' => [],
				'menu-classes' => []
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
	public function getSubComponents(): array {
		return $this->options['items'];
	}

	/**
	 * @return array
	 */
	public function getContainerClasses() : array {
		return $this->options['container-classes'];
	}

	/**
	 * @return array
	 */
	public function getButtonGroupClasses() : array {
		return $this->options['button-group-classes'];
	}

	/**
	 * @return array
	 */
	public function getButtonClasses() : array {
		return $this->options['button-classes'];
	}

		/**
		 * @return array
		 */
	public function getSplitButtonClasses() : array {
		return $this->options['split-button-classes'];
	}

	/**
	 * @return array
	 */
	public function getMenuClasses() : array {
		return $this->options['menu-classes'];
	}

	/**
	 * @return Message
	 */
	public function getButtonText() : Message {
		return $this->options['button-text'];
	}

	/**
	 * @return Message
	 */
	public function getButtonTitle() : Message {
		return $this->options['button-title'];
	}

	/**
	 * @return Message
	 */
	public function getSplitButtonTitle() : Message {
		return $this->options['split-button-title'];
	}

	/**
	 * @return Message
	 */
	public function getButtonGroupAriaLabel() : Message {
		return $this->options['button-group-aria-label'];
	}

	/**
	 * @return Message
	 */
	public function getButtonAriaLabel() : Message {
		return $this->options['button-aria-label'];
	}

	/**
	 * @return Message
	 */
	public function getSplitButtonAriaLabel() : Message {
		return $this->options['split-button-aria-label'];
	}

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getButtonGroupRole() : string {
		return $this->options['button-group-role'];
	}

	/**
	 *
	 * @return bool
	 */
	public function buttonIsDisabled() : bool {
		return $this->options['button-disabled'];
	}

		/**
		 *
		 * @return bool
		 */
	public function splitButtonIsDisabled() : bool {
		return $this->options['split-button-disabled'];
	}
}