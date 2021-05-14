<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Card;

class CollapsibleCard extends Card {
	/** @var boolean */
	protected $isExpanded = false;

	/**
	 * @param array $config
	 * @param boolean $isExpanded
	 */
        public function __construct( $config=[], $isExpanded=false ) {
		$this->config = $config;
		$this->isExpanded = $isExpanded;
        }

	/**
	 * @param array $config
	 * @param boolean $isExpanded
	 * @return Static
	 */
        public static function factory( $config=[], $isExpanded=false ) {
                return new static( $config, $isExpanded );
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
					'controls' => $params['id'],
					'class' => $class
				]
			]
		);

		return $params;
        }
}
