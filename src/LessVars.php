<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class LessVars {
	protected static $instance = null;

	/** @var array */
	protected $vars = [];

	/**
	 * @return static
	 */
	public static function getInstance() {
		if ( static::$instance === null ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * @param string $name
	 * @param mixed $default
	 * @return string
	 */
	public function getVar( $name, $default = null ) {
		if ( isset( $this->vars[$name] ) ) {
			return $this->vars[$name];
		}

		return $default;
	}

	/**
	 * @return array
	 */
	public function getAllVars() {
		return $this->vars;
	}

	/**
	 * @param string $name
	 * @param string $value
	 * @return void
	 */
	public function setVar( $name, $value ) {
		$this->vars[$name] = $value;
	}
}
