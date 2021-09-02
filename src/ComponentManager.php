<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use IContextSource;
use MediaWiki\HookContainer\HookContainer;
use MediaWiki\MediaWikiServices;
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

	/**
	 *
	 * @var ComponentManager|null
	 */
	private static $instance = null;

	/**
	 *
	 * @var HookContainer
	 */
	private $hookContainer = null;

	/**
	 *
	 * @var boolean
	 */
	private $async = false;

	/**
	 *
	 * @var array
	 */
	private $exclusivePathes = [];

	/**
	 *
	 * @param IContextSource $context
	 * @param array $slotSpecs
	 * @param array $enabledSlots
	 * @param ObjectFactory|null $objectFactory
	 * @param HookContainer|null $hookContainer
	 *
	 * @return ComponentManager
	 */
	public static function singleton( IContextSource $context, $slotSpecs, $enabledSlots,
	$objectFactory = null, $hookContainer = null ) : ComponentManager {
		if ( static::$instance == null ) {
			static::$instance = new ComponentManager(
				$slotSpecs,
				$enabledSlots,
				$objectFactory,
				$hookContainer
			);
			static::$instance->init( $context );
		}

		return static::$instance;
	}

	/**
	 *
	 * @param array $slotSpecs
	 * @param array $enabledSlots
	 * @param ObjectFactory|null $objectFactory
	 * @param HookContainer|null $hookContainer
	 */
	public function __construct( $slotSpecs, $enabledSlots,
		$objectFactory = null, $hookContainer = null ) {
		$this->slotSpecs = $slotSpecs;
		$this->enabledSlots = $enabledSlots;
		$this->objectFactory = $objectFactory;
		if ( $this->objectFactory instanceof ObjectFactory === false ) {
			$this->objectFactory = \MediaWiki\MediaWikiServices::getInstance()->getObjectFactory();
		}
		if ( $this->hookContainer instanceof HookContainer === false ) {
			$this->hookContainer = \MediaWiki\MediaWikiServices::getInstance()->getHookContainer();
		}
	}

	/**
	 * @param IContextSource $context
	 * @param bool $async
	 * @param array $exclusivePathes
	 * @return void
	 */
	public function init( $context, $async = false, $exclusivePathes = [] ) {
		$this->context = $context;
		$this->async = $async;
		$this->exclusivePathes = $exclusivePathes;

		$registry = MediaWikiServices::getInstance()->getService( 'MWStakeSkinSlotRegistry' );
		$this->hookContainer->run( 'MWStakeCommonUIRegisterSkinSlotComponents', [ $registry ] );

		// TODO: limit tree walk to exclusive pathes!
		foreach ( $registry->getSkinSlots() as $slotId => $specs ) {
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
	 * @param array $data
	 * @return array
	 */
	public function getCustomComponentTree( $component, $data = [] ) {
		$tree = [];
		$this->processComponent( $component, $tree, $data );
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
	 * @param array $data
	 * @return void
	 */
	private function processComponent( $component, &$treeNode, $data = [] ) {
		if ( $component instanceof IRestrictedComponent && !$this->checkPermissions( $component ) ) {
			return;
		}
		if ( !$component->shouldRender( $this->context ) ) {
			return;
		}
		$component->setComponentData( $data );

		$id = $component->getId();

		$this->rlModules = array_merge( $component->getRequiredRLModules(), $this->rlModules );
		$this->rlStyles = array_merge( $component->getRequiredRLStyles(), $this->rlStyles );

		$newTreeNode = [
			'component' => $component,
			'subComponents' => []
		];
		$subComponents = $component->getSubComponents();
		foreach ( $subComponents as $subComponent ) {
			$this->processComponent( $subComponent, $newTreeNode['subComponents'], $data );
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

	/**
	 *
	 * @param IRestrictedComponent $component
	 * @return bool
	 */
	private function checkPermissions( $component ) : bool {
		$user = $this->context->getUser();
		$services = MediaWikiServices::getInstance();
		foreach ( $component->getPermissions() as $permission ) {
			$userHasRight = $services->getPermissionManager()->userHasRight(
				$user,
				$permission
			);
			if ( $userHasRight ) {
				return true;
			}
		}
		return false;
	}

}
