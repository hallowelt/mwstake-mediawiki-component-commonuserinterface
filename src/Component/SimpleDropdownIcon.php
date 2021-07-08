<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownIcon;
use RawMessage;

class SimpleDropdown extends ComponentBase implements IDropdownIcon {
	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => 'simple-dropdown',
				'title' => new RawMessage( 'simple dropdown' ),
				'aria-label' => new RawMessage( 'simple dropdown' ),
				'items' => [],
				'container-classes' => [],
				'button-classes' => [],
				'icon-classes' => [],
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
	public function getButtonClasses() : array {
		return $this->options['button-classes'];
	}

	/**
	 * @return array
	 */
	public function getMenuClasses() : array {
		return $this->options['menu-classes'];
	}

	/**
	 * @return array
	 */
	public function getIconClasses() : array {
		return $this->options['icon-classes'];
	}

	/**
	 * @return Message
	 */
	public function getTitle() : Message {
		return $this->options['title'];
	}

	/**
	 * @return Message
	 */
	public function getAriaLabel() : Message {
		return $this->options['aria-label'];
	}
}
