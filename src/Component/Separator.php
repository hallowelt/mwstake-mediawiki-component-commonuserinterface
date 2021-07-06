<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MWStake\MediaWiki\Component\CommonUserInterface\ISeparator;

class Separator extends ComponentBase implements ISeparator {

	/**
	 *
	 * @var array
	 */
	private $classes = [];

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
	 * @return string[]
	 */
	public function getContainerClasses() : array {
		return $this->classes;
	}
}
