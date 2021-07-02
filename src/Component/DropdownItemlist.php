<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownItemlist;

class DropdownItemlist extends ComponentBase implements IDropdownItemlist {
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
	public function getLinks() : array {
		return $this->links;
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->id;
	}
}
