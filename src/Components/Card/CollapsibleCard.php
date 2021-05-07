<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Component\Card;

class CollapsibleCard extends Card {
	/** @var boolean */
	protected $isExpanded = [];

	/**
	 * @param string $id
	 * @param string $class
	 * @param boolean $isExpanded
	 * @param string $body
	 * @param string $header
	 * @param string $footer
	 * @param array $img
	 * @return Static
	 */
        public function __construct( $id='', $class='', $isExpanded=false, $body='', $header='', $footer='', $img=[] ) {
		$this->cardBody = $body;
		$this->cardClass = $class;
		$this->cardFooter = $footer;
		$this->cardHeader = $header;
		$this->cardId = $id;
		$this->cardImage = $img;
		$this->isExpanded = $isExpanded;
        }

	/**
	 * @param string $id
	 * @param string $class
	 * @param boolean $isExpanded
	 * @param string $body
	 * @param string $header
	 * @param string $footer
	 * @param array $img
	 * @return Static
	 */
        public static function factory( $id='', $class='', $isExpanded=false, $body='', $header='', $footer='', $img=[] ) {
                return new static( $id,$class, $isExpanded=false, $body, $header='', $footer='', $img=[] );
        }

	/**
         * @return string
         */
        protected function getTemplateName() {
                return 'collapsible-card';
        }

        /**
         * @return array
         */
        protected function getParams() {
		$params = parent::getParams();

		$class = 'collapse';
		$expanded = 'false';
		if ( $this->isExpanded !== false ) {
			$class = 'collapse show';
			$expanded = 'true';
		}

		$params = array_merge(
			$params,
			[
				'collapse' => [
					'expanded' => $expanded,
					'controls' => $this->cardId,
					'class' => $class
				]
			]
		);

		return $params;
        }
}
