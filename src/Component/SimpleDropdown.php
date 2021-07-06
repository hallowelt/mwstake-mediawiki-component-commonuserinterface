<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdown;
use RawMessage;

class SimpleDropdown extends ComponentBase implements IDropdown {
	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => '',
				'aria-label' => new RawMessage( 'simple dropdown' ),
				'aria-desc' => new RawMessage( 'simple-dropdown' ),
				'items' => [],
				'container-classes' => []
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
	 * @return Message
	 */
	public function getAriaLabel() : Message {
		return $this->options['aria-label'];
	}

	/**
	 * @return Message
	 */
	public function getAriaDesc() : Message {
		return $this->options['aria-desc'];
	}
}
