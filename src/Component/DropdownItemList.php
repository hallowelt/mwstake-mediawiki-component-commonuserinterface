<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

class DropdownItemList extends ComponentBase {
	/**
	 *
	 * @var string
	 */
	private $id = '';

	/**
	 *
	 * @var array $links
	 */
	private $links = [];

	/**
	 *
	 * @param array $links
	 */
	public function __construct( $id, $links ) {
		$this->id = $id;
		$this->links = $links;
	}

	/**
	 * @inheritDoc
	 */
	public function getLinks() {
		return array_values( $this->links ); 
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->id;
	}
}
