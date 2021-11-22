<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\ILink;
use RawMessage;

class SimpleLink extends ComponentBase implements ILink {

	/**
	 *
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'role' => '',
				'classes' => [],
				'href' => '',
				'title' => new RawMessage( 'SimpleLink' ),
				'aria-label' => new RawMessage( 'SimpleLink' ),
				'rel' => '',
				'data' => [],
				'items' => [],
				'aria' => [],
				'target' => ''
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
	public function getSubComponents() : array {
		return $this->options['items'];
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
	public function getRole() : string {
		return $this->options['role'];
	}

	/**
	 * @inheritDoc
	 */
	public function getTitle() : Message {
		return $this->options['title'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaLabel() : Message {
		return $this->options['aria-label'];
	}

	/**
	 * @inheritDoc
	 */
	public function getDataAttributes() : array {
		return $this->options['data'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaAttributes() : array {
		return $this->options['aria'];
	}

	/**
	 * @inheritDoc
	 */
	public function getHref() : string {
		return $this->options['href'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRel() : string {
		return $this->options['rel'];
	}

	/**
	 * @inheritDoc
	 */
	public function getTarget() : string {
		return $this->options['target'];
	}
}
