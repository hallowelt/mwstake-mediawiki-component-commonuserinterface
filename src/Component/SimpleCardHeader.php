<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ICardHeader;

class SimpleCardHeader extends ComponentBase implements ICardHeader {

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
		$this->options = array_merge(
			[
				'id' => '',
				'classes' => [],
				'items' => []
			],
			$options
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getId() : string {
		return $this->options['id'];
	}

	/**
	 * @inheritDoc
	 */
	public function getClasses() : array {
		return $this->options['classes'];
	}

	/**
	 * @inheritDoc
	 */
	public function getSubComponents() : array {
		return $this->options['items'];
	}
}
