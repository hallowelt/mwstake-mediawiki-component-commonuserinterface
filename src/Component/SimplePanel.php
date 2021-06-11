<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IPanel;
use RawMessage;

class SimplePanel extends ComponentBase implements IPanel {

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
			'title' => new RawMessage( 'Some title' ),
			'tooltip' => new RawMessage( 'Some tooltip' ),
			'tools' => [],
			'badges' => [],
			'trigger-rl-dependencies' => [],
			'callback-function-name' => [],
			'container-classes' => [],
			'container-data' => [],
			'collapse-state' => false,
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
	 * @return Message
	 */
	public function getTitle() {
		return $this->options['title'];
	}

	/**
	 * @return Message
	 */
	public function getTitleTooltip(){
		return $this->options['tooltip'];
	}

	/**
	 * @return ITool[]
	 */
	public function getTools(){
		return $this->options['tools'];
	}

	/**
	 * @return IBadge[]
	 */
	public function getBadges(){
		return $this->options['badges'];
	}

	/**
	 * @return string[]
	 */
	public function getTriggerRLDependencies(){
		return $this->options['trigger-rl-dependencies'];
	}

	/**
	 * @return string
	 */
	public function getTriggerCallbackFunctionName(){
		return $this->options['callback-function-name'];
	}

	/**
	 * @return string[]
	 */
	public function getContainerClasses(){
		return $this->options['container-classes'];
	}

	/**
	 * @return array
	 */
	public function getContainerData(){
		return $this->options['container-data'];
	}

	/**
	 *
	 * @return bool
	 */
	public function getPanelCollapseState(){
		return $this->options['collapse-state'];
	}

	/**
	 * @inheritDoc
	 */
	public function getSubComponents(): array {
		return $this->options['items'];
	}
}