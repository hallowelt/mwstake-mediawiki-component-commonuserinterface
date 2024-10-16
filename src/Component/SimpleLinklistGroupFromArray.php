<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ILinklistGroupFromArray;

class SimpleLinklistGroupFromArray extends ComponentBase implements ILinklistGroupFromArray {

	/**
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => '',
				'links' => [],
				'classes' => [],
				'aria' => [],
				'role' => '',
				'item-role' => ''
			],
			$options
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getLinks(): array {
		return $this->options['links'];
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->options['id'];
	}

	/**
	 * @return array
	 */
	public function getContainerClasses(): array {
		return $this->options['classes'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaAttributes(): array {
		return $this->options['aria'];
	}

	/**
	 * @return string
	 */
	public function getContainerRole(): string {
		return $this->options['role'];
	}

	/**
	 * @return string
	 */
	public function getItemRole(): string {
		return $this->options['item-role'];
	}
}
