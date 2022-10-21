Example for creating a tree in a component like SimpleCard

	/**
	 * @inheritDoc
	 */
	public function getSubComponents(): array {
		$services = MediaWikiServices::getInstance();
		$objectFactory = $services->get( 'ObjectFactory' );
		$treeData = new TreeData( $objectFactory );
		$nodes = $treeData->getTreeNodes( $this->getTreeData() );

		return $nodes;
	}

	private function getTreeData(): array {
		return [
			[
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
				'options' => [
					'id' => 'root-node',
					'text' => 'node-1',
					'items' => [
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-2',
								'text' => 'node-3',
								'items' => []
							]
						],
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-3',
								'text' => 'node-4',
								'items' => [
									[
										'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
										'options' => [
											'id' => 'dummy-4',
											'text' => 'node-5',
											'items' => []
										]
									]
								]
							]
						]
					]
				]
			],
			[
				'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
				'options' => [
					'id' => 'dummy-5',
					'text' => 'node-2',
					'items' => [
						[
							'class' => 'MWStake\\MediaWiki\\Component\\CommonUserInterface\\Component\\SimpleTreeTextNode',
							'options' => [
								'id' => 'dummy-6',
								'text' => 'node-6',
								'items' => []
							]
						]
					]
				]
			]
		];
	}