<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use RawMessage;

class SimpleAccordionItem extends ComponentBase implements IAccordionItem {

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
			'header-text' => new RawMessage( 'Some label' ),
			'tooltip' => new RawMessage( 'Some tooltip' ),
			'items' => []
		], $options );
	}

	/**
	 * @inheritDoc
	 */
	public function getId() : string {
		return $this->options['id'];
	}

	/**
	 *
	 * @return Message
	 */
	public function getHeaderText() : Message {
		return $this->options['header-text'];
	}

	/**
	 * @return Message
	 */
	public function getTooltip() : Message {
		return $this->options['tooltip'];
	}

	/**
	 * @inheritDoc
	 */
	public function getSubComponents() : array {
		return $this->options['items'];
	}
}
