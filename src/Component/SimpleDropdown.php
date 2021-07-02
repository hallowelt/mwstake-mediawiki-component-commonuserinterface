<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\IDropdown;

class SimpleDropdown extends ComponentBase implements IDropdown {
	/**
	 *
	 * @param array $links
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => '',
				'aria-label' => '',
				'aria-desc' => '',
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
	 * @return string
	 */
	public function getAriaLabel() : string {
		return $this->options['aria-label'];
	}

	/**
	 * @return string
	 */
	public function getAriaDesc() : string {
		return $this->options['aria-desc'];
	}
}
