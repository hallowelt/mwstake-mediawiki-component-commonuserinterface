<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ILinklistGroup;

class SimpleLinklistGroup extends ComponentBase implements ILinklistGroup {

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
	 * @return array
	 */
	public function getContainerClasses() : array {
		return $this->options['classes'];
	}
}
