<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

class Literal extends ComponentBase {

	/**
	 *
	 * @var string
	 */
	private $id = '';

	/**
	 *
	 * @var string
	 */
	private $html = '';

	/**
	 *
	 * @param string $id
	 * @param string $html
	 */
	public function __construct( $id, $html ) {
		$this->id = $id;
		$this->html = $html;
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * Raw HTML string
	 *
	 * @return string
	 */
	public function getHtml() {
		return $this->html;
	}
}
