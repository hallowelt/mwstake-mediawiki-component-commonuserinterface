<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Config;
use Wikimedia\ObjectFactory\ObjectFactory;

class TreeDataGenerator {

	/**
	 * @var ObjectFactory
	 */
	private $objectFactory = null;

	/**
	 * @var string
	 */
	private $validInterface = 'MWStake\MediaWiki\Component\CommonUserInterface\ITreeNode';


	/**
	 * @var array
	 */
	private $nodeRegistry = [];

	/**
	 * @var array
	 */
	private $data = [];

	/**
	 * @param ObjectFactory $objectFactory
	 */
	public function __construct( ObjectFactory $objectFactory, Config $config ) {
		$this->objectFactory = $objectFactory;
		#$this->nodeRegistry = $config->get( 'mwsgCommonUIComponentTreeNodeRegistry' );
		$this->nodeRegistry = $GLOBALS['mwsgCommonUIComponentTreeNodeRegistry'];
	}

	/**
	 * @param array $data
	 * @return ITreeNode[]
	 */
	public function getTreeNodes( array $data ): array {
		$nodes = [];

		foreach ( $data as $nodeOptions ) {
			$nodeOptions = array_merge(
				[
					'id' => '',
					'items' => []
				],
				$nodeOptions
			);

			$node = $this->createNode( $nodeOptions );

			if ( is_a( $node, $this->validInterface, true ) ) {
				$nodes[] = $node;
			}
		}
		return $nodes;
	}

	/**
	 * @param array $options
	 * @return ITreeNode|null
	 */
	private function createNode( array $options ): ?ITreeNode {
		$nodeType = $this->getNodeType( $options );
		$nodeName = $this->getNodeName( $nodeType );

		if ( !isset( $this->nodeRegistry[$nodeName] ) ) {
			return false;
		}

		$spec = $this->nodeRegistry[$nodeName];

		if ( !empty( $options['items'] ) ) {
			$options['items'] = $this->getTreeNodes( $options['items'] );
		}

		$node = $this->objectFactory->createObject( $spec );
		$node->setNodeOptions( $options );

		return $node;
	}

	/**
	 * @param array $nodeSpec
	 */
	private function getNodeType( array $nodeSpec ): string {
		$nodeType = 'text';

		if ( isset( $nodeSpec['href'] ) ) {
			$nodeType = 'link';
		}

		return $nodeType;
	}

	/**
	 * Get the name of the node type to create a object
	 * Examples:
	 * - For type 'text' create node of 'tree-text-node'
	 * - For type 'link' create node of 'tree-link-node'
	 * 
	 * @param string $nodeType
	 * @return string
	 */
	private function getNodeName( string $nodeType ): string {
		return "tree-$nodeType-node";
	}
}


