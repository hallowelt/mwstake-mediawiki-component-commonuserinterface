Example for creating a tree in a component like SimpleCard

class MyTree extends SimpleTreeContainer {

	/**
	 * @inheritDoc
	 */
	public function getId(): string {
		return 'my-tree';
	}

	/**
	 * @inheritDoc
	 */
	public function getSubComponents(): array {
		$services = MediaWikiServices::getInstance();
		$treeDataGenerator = $services->get( 'MWStakeCommonUITreeDataGenerator' );

		$nodes = $treeDataGenerator->generate(
			$this->getTreeData(),
			$this->getTreeExpandPaths()
		);

		return $nodes;
	}

	/**
	 * @return array
	 */
	private function getTreeData(): array {
		/** @var IContextSource */
		$context = RequestContext::getMain();

		/** @var Title */
		$title = $context->getTitle();

		$subpageDataGenerator = new SubpageDataGenerator();
		$subpageData = $subpageDataGenerator->generate( $title );

		return $subpageData;
	}

	/**
	 * @return array
	 */
	protected function getExpandPaths(): array {
		return [
			'dummy-1/dummy-3',
			'dummy-5',
		];
	}
}