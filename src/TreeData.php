<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Wikimedia\ObjectFactory\ObjectFactory;

class TreeData {

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
	private $data = [];

	/**
	 * @param ObjectFactory $objectFactory
	 */
	public function __construct( ObjectFactory $objectFactory ) {
		$this->objectFactory = $objectFactory;
	}

	/**
	 * @param array $data
	 * @return ITreeNode[]
	 */
	public function getTreeNodes( array $data ): array {
		$nodes = [];
		foreach ( $data as $nodeSpec ) {
			if ( !isset( $nodeSpec['class'] ) && !isset( $nodeSpec['factory'] ) ) {
				// Not a valid object spec
				continue;
			}

			$nodeSpec = array_merge(
				[
					'options' => [
						'id' => '',
						'items' => []
					]
				],
				$nodeSpec
			);

			$node = $this->createNode( $nodeSpec );

			if ( is_a( $node, $this->validInterface, true ) ) {
				$nodes[] = $node;
			}
		}

		return $nodes;
	}

	/**
	 * @param array $spec
	 * @return ITreeNode|null
	 */
	private function createNode( array $spec ): ?ITreeNode {
		$options = $spec['options'];
		unset( $spec['options'] );

		if ( !empty( $options['items'] ) ) {
			$options['items'] = $this->getTreeNodes( $options['items'] );
		}

		$node = $this->objectFactory->createObject( $spec );
		$node->setNodeData( $options );

		return $node;
	}
}


