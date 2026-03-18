<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component;

use MediaWiki\Language\RawMessage;
use MediaWiki\Message\Message;
use MWStake\MediaWiki\Component\CommonUserInterface\IActionLink;
use MWStake\MediaWiki\Component\CommonUserInterface\IRestrictedComponent;

class ActionLink extends ComponentBase implements IActionLink, IRestrictedComponent {

	/**
	 * @param array $options
	 */
	public function __construct( $options ) {
		$this->options = array_merge(
			[
				'id' => 'action-link',
				'role' => '',
				'classes' => [],
				'permissions' => [],
				'href' => '',
				'title' => new RawMessage( 'ActionLink' ),
				'text' => new RawMessage( 'ActionLink' ),
				'rel' => '',
				'data' => [],
				'aria' => [],
				'action-aria' => [],
				'icon' => '',
				'showAction' => false,
				'action-title' => new RawMessage( 'ActionLink action' ),
				'actionClass' => '',
				'action-label' => new RawMessage( 'ActionLink action'),
				'showActionLabel' => false
			],
			$options
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getText(): Message {
		return $this->options['text'];
	}

	/**
	 * @inheritDoc
	 */
	public function getClasses(): array {
		return $this->options['classes'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRole(): string {
		return $this->options['role'];
	}

	/**
	 * @inheritDoc
	 */
	public function getTitle(): Message {
		return $this->options['title'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaLabel(): Message {
		return $this->options['aria-label'];
	}

	/**
	 * @inheritDoc
	 */
	public function getDataAttributes(): array {
		return $this->options['data'];
	}

	/**
	 * @inheritDoc
	 */
	public function getAriaAttributes(): array {
		return $this->options['aria'];
	}

	/**
	 * @inheritDoc
	 */
	public function getHref(): string {
		return $this->options['href'];
	}

	/**
	 * @inheritDoc
	 */
	public function getRel(): string {
		return $this->options['rel'];
	}

	public function getId(): string {
		return $this->options['id'];
	}

	public function getPermissions(): array {
		return $this->options['permissions'];
	}

	/**
	 * @inheritDoc
	 */
	public function showAction(): bool {
		return $this->options['showAction'];
	}

	/**
	 * @inheritDoc
	 */
	public function getActionClass(): string {
		return $this->options['actionClass'];
	}

	/**
	 * @inheritDoc
	 */
	public function getIcon(): string {
		return $this->options['icon'];
	}

	/**
	 * @inheritDoc
	 */
	public function getActionAriaLabel(): Message {
		return $this->options['action-aria-label'];
	}

	/**
	 * @inheritDoc
	 */
	public function getActionTitle(): Message {
		return $this->options['action-title'];
	}

	/**
	 * @inheritDoc
	 */
	public function getActionLabel(): Message {
		return $this->options['action-label'];
	}

	/**
	 * @inheritDoc
	 */
	public function showActionLabel(): bool {
		return $this->options['showActionLabel'];
	}

	/**
	 *
	 * @inheritDoc
	 */
	public function getRequiredRLStyles(): array {
		return [ 'mwstake.component.commonui.action-link-component.styles' ];
	}
}
