<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownItemlist;

class SimpleDropdownItemlist extends ComponentBase implements IDropdownItemlist {

	/**
	 *
	 * @var array $options
	 */
	private $options = [];

	/**
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => '',
				'links' => [],
				'classes' => ''
			],
			$options
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getLinks() : array {
		return $this->options['links'];
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->options['id'];
	}

	/**
	 *
	 * @return string[]
	 */
	public function getClasses() : array {
		return $this->options['classes'];
	}
}
