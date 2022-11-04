<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

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
	private $treeNodeRegistry = [];

	/**
	 * @param array $treeNodeRegistry
	 * @param ObjectFactory $objectFactory
	 */
	public function __construct( array $treeNodeRegistry, ObjectFactory $objectFactory ) {
		$this->treeNodeRegistry = $treeNodeRegistry;
		$this->objectFactory = $objectFactory;
	}

	/**
	 * @param array $data
	 * @return ITreeNode[]
	 */
	public function generate( array $data ): array {
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

		if ( !isset( $this->treeNodeRegistry[$nodeName] ) ) {
			return false;
		}

		$spec = $this->treeNodeRegistry[$nodeName];
		$node = $this->objectFactory->createObject( $spec );

		if ( !empty( $options['items'] ) ) {
			$options['items'] = $this->generate( $options['items'] );
		}
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


