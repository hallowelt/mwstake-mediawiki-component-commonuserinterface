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
	private $slotSpecs = [];

	/**
	 *
	 * @var array
	 */
	private $slotComponentTrees = [];

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

	private static $instance = null;

	/**
	 *
	 * @param IContextSource $context
	 * @param array $slotSpecs
	 * @param array $enabledSlots
	 * @param ObjectFactory|null $objectFactory
	 *
	 * @return ComponentManager
	 */
	public static function singleton( IContextSource $context, $slotSpecs, $enabledSlots,
	$objectFactory = null ) : ComponentManager {
		if ( static::$instance == null ) {
			static::$instance = new ComponentManager(
				$context,
				$slotSpecs,
				$enabledSlots,
				$objectFactory
			);
			static::$instance->init();
		}

		return static::$instance;
	}

	/**
	 *
	 * @param IContextSource $context
	 * @param array $slotSpecs
	 * @param array $enabledSlots
	 * @param ObjectFactory|null $objectFactory
	 */
	public function __construct( IContextSource $context, $slotSpecs, $enabledSlots,
		$objectFactory = null ) {
		$this->context = $context;
		$this->slotSpecs = $slotSpecs;
		$this->enabledSlots = $enabledSlots;
		$this->objectFactory = $objectFactory;
		if ( $this->objectFactory instanceof ObjectFactory === false ) {
			$this->objectFactory = \MediaWiki\MediaWikiServices::getInstance()->getObjectFactory();
		}
	}

	/**
	 *
	 * @var string
	 */
	private $currentSlot = '';

	/**
	 *
	 * @return void
	 */
	public function init() {
		// Load all "skin slots", build up component trees, get RL modules to load from each component
		foreach ( $this->slotSpecs as $slotId => $specs ) {
			if ( !in_array( $slotId, $this->enabledSlots ) ) {
				continue;
			}
			$this->slotComponentTrees[$slotId] = [];
			$this->currentSlot = $slotId;
			foreach ( $specs as $spec ) {
				$component = $this->objectFactory->createObject( $spec );
				$this->processComponent( $component, $this->slotComponentTrees[$slotId] );
			}
		}
	}

	/**
	 *
	 * @param IComponent $component
	 * @return array
	 */
	public function getCustomComponentTree( $component ) {
		$tree = [];
		$this->processComponent( $component, $tree );
		return $tree;
	}

	/**
	 *
	 * @param string $slotId
	 * @return array
	 */
	public function getSkinSlotComponentTree( $slotId ) {
		return $this->slotComponentTrees[$slotId];
	}

	/**
	 *
	 * @param IComponent $component
	 * @param array &$treeNode
	 * @return void
	 */
	private function processComponent( $component, &$treeNode ) {
		if ( !$component->shouldRender( $this->context ) ) {
			return;
		}

		$id = $component->getId();

		$this->rlModules = array_merge( $component->getRequiredRLModules(), $this->rlModules );
		$this->rlStyles = array_merge( $component->getRequiredRLStyles(), $this->rlStyles );

		$newTreeNode = [
			'component' => $component,
			'subComponents' => []
		];
		$subComponents = $component->getSubComponents();
		foreach ( $subComponents as $subComponent ) {
			$this->processComponent( $subComponent, $newTreeNode['subComponents'] );
		}

		$treeNode[$id] = $newTreeNode;
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

	/**
	 *
	 * @param IComponent $component
	 * @return string
	 */
	public function getComponentId( $component ) {
		return '';
	}

}
