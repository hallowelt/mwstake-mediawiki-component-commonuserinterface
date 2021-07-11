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
				'main-button-text' => new RawMessage( 'SimpleSplitButton' ),
				'menu-button-text' => new RawMessage( 'SimpleSplitButton' ),
				'main-button-title' => new RawMessage( 'SimpleSplitButton' ),
				'main-button-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'menu-button-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'button-group-aria-label' => new RawMessage( 'SimpleSplitButton' ),
				'button-group-role' => 'button',
				'items' => [],
				'container-classes' => [],
				'button-group-classes' => [],
				'main-button-classes' => [],
				'menu-button-classes' => [],
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
	public function getMainButtonClasses() : array {
		return $this->options['main-button-classes'];
	}

		/**
	 * @return array
	 */
	public function getMenuButtonClasses() : array {
		return $this->options['menu-button-classes'];
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
	public function getMainButtonText() : Message {
		return $this->options['main-button-text'];
	}

	/**
	 * @return Message
	 */
	public function getMainButtonTitle() : Message {
		return $this->options['main-button-title'];
	}

	/**
	 * @return Message
	 */
	public function getMenuButtonTitle() : Message {
		return $this->options['menu-button-title'];
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
	public function getMainButtonAriaLabel() : Message {
		return $this->options['main-button-aria-label'];
	}

	/**
	 * @return Message
	 */
	public function getMenuButtonAriaLabel() : Message {
		return $this->options['menu-button-aria-label'];
	}

	/**
	 * One of the `ARIARole::*` constants
	 *
	 * @return string
	 */
	public function getButtonGroupRole() : string {
		return $this->options['button-group-role'];
	}
}
