<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

class SimpleAccordion extends ComponentBase implements IAccordion {

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
			'items' => []
		], $options );
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
	public function getSubComponents() : array {
		return $this->options['items'];
	}
}
