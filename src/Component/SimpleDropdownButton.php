<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use HtmlArmor;
use MediaWiki\Language\RawMessage;
use MediaWiki\Message\Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IDropdownButton;

class SimpleDropdownButton extends ComponentBase implements IDropdownButton {

	/**
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => 'simple-dropdown-button',
				'text' => new RawMessage( 'simple dropdown button' ),
				'title' => new RawMessage( 'simple dropdown button' ),
				'aria-label' => new RawMessage( 'simple dropdown button' ),
				'disabled' => false,
				'items' => [],
				'container-classes' => [],
				'button-classes' => [],
				'menu-classes' => [],
				'preHtml' => new HtmlArmor( '' ),
				'postHtml' => new HtmlArmor( '' )
			],
			$options
		);
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
	public function getSubComponents(): array {
		return $this->options['items'];
	}

	/**
	 * @return array
	 */
	public function getContainerClasses(): array {
		return $this->options['container-classes'];
	}

	/**
	 * @return array
	 */
	public function getButtonClasses(): array {
		return $this->options['button-classes'];
	}

	/**
	 * @return array
	 */
	public function getMenuClasses(): array {
		return $this->options['menu-classes'];
	}

	/**
	 * @return Message
	 */
	public function getText(): Message {
		return $this->options['text'];
	}

	/**
	 * @return Message
	 */
	public function getTitle(): Message {
		return $this->options['title'];
	}

	/**
	 * @return Message
	 */
	public function getAriaLabel(): Message {
		return $this->options['aria-label'];
	}

	/**
	 * @return bool
	 */
	public function isDisabled(): bool {
		return $this->options['disabled'];
	}

	/**
	 * @return HtmlArmor
	 */
	public function getPreHtml(): HtmlArmor {
		return $this->options['preHtml'];
	}

	/**
	 * @return HtmlArmor
	 */
	public function getPostHtml(): HtmlArmor {
		return $this->options['postHtml'];
	}
}
