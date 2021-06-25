<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

use Exception;
use MWStake\MediaWiki\Component\CommonUserInterface\IPanel;
use MWStake\MediaWiki\Component\CommonUserInterface\Renderer\RendererBase;

class Card extends RendererBase {
	/** @var string */
	protected $cardId = '';

	/** @var string */
	protected $cardClass = '';

	/** @var string */
	protected $cardcontent = '';

	/** @var string */
	protected $cardHeader = '';
	/** @var string */
	protected $cardFooter = '';

	/** @var array */
	protected $cardImage = [];

	/**
	 * @param array $config
	 */
	public function __construct( $config=[] ) {
		/**
		 * Config key 'content' can be a linklist or card-body.
		 * You need to wrap it into html like <div class="card-body">...</div>.
		 * See https://getbootstrap.com/docs/5.0/components/card/
		 */
		$this->config = $config;
	}

	/**
	 * @param array $config
	 * @return Static
	 */
	public static function factory( $config=[] ) {
		return new static( $config );
	}

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return dirname( dirname( dirname( dirname( __DIR__ ) ) ) ) . '/resources/templates/card/card.mustache';
	}

	/**
	 * @inheritDoc
	 */
	public function getRendererDataTreeNode( $component, $subComponentNodes ) : array {
		$templateData = [
			'id' => $component->getId(),
			'class' => '',
			'content' => $subComponentNodes,
		];
		if( $component instanceof IPanel ) {
			$templateData['class'] = $component->getContainerClasses();
		}
		else {
			throw new Exception( "Can not extract data from ". get_class( $component ) );
		}

		return $templateData;
	}

}
