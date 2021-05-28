<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;
use Wikimedia\ObjectFactory;

class ComponentManager {

	/**
	 *
	 * @var IContextSource
	 */
	private $context = null;

	/**
	 *
	 * @var array
	 */
	private $slots = [];

	/**
	 *
	 * @var array
	 */
	private $enabledSlots = [];

	/**
	 *
	 * @var ObjectFactory
	 */
	private $objectFactory = null;

	/**
	 *
	 * @var array
	 */
	private $rlModules = [];

	/**
	 *
	 * @var array
	 */
	private $rlStyles = [];

	/**
	 * Undocumented function
	 *
	 * @param IContextSource $context
	 * @param array $slots
	 * @param array $enabledSlots
	 * @param ObjectFactory $objectFactory
	 */
	public function __construct( IContextSource $context, $slots, $enabledSlots, $objectFactory = null ) {
		$this->context = $context;
		$this->slots = $slots;
		$this->enabledSlots = $enabledSlots;
		$this->objectFactory = $objectFactory;
		if ($this->objectFactory instanceof ObjectFactory === false ) {
			$this->objectFactory = \MediaWiki\MediaWikiServices::getInstance()->getObjectFactory();
		}
	}

	/**
	 *
	 * @return void
	 */
	public function init() {
		//Load all "skin slots", build up component trees, get RL modules to load from each component
		foreach ( $this->slots as $slotId => $components ) {
			if ( !in_array( $slotId, $this->enabledSlots ) ) {
				continue;
			}
			foreach( $components as $spec ) {
				$component = $this->objectFactory->createObject( $spec );
				$this->processComponent( $component );
			}
		}
	}

	/**
	 *
	 * @param IComponent $component
	 * @return void
	 */
	private function processComponent( $component ) {
		if ( !$component->shouldRender( $this->context ) ) {
			return;
		}

		$id = $component->getId();

		$this->rlModules = array_merge( $component->getRequiredRLModules(), $this->rlModules );
		$this->rlStyles = array_merge( $component->getRequiredRLStyles(), $this->rlStyles );

		$subComponents = $component->getSubComponents();
		foreach ( $subComponents as $subComponent ) {
			$this->processComponent( $subComponent );
		}
	}

	/**
	 *
	 * @return string[]
	 */
	public function getRLModules() {
		$this->rlModules = array_unique( $this->rlModules );
		sort( $this->rlModules );
		return $this->rlModules;
	}

	/**
	 *
	 * @return string[]
	 */
	public function getRLModuleStyles() {
		$this->rlStyles = array_unique( $this->rlStyles );
		sort( $this->rlStyles );
		return $this->rlStyles;
	}

}