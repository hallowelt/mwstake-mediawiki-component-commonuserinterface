<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

class Separator extends ComponentBase {

	/**
	 *
	 * @var string
	 */
	private $class = '';

	/**
	 *
	 * @param string $class
	 */
	public function __construct( $class ) {
		$this->class = $class;
	}

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return 'id is not used in mustache template';
	}

	/**
	 * Raw HTML string
	 *
	 * @return string
	 */
	public function getHtml() : string {
		return $this->html;
	}

	/**
	 *
	 * @return string
	 */
	public function getClass() : string {
		return $this->class;
	}
}
