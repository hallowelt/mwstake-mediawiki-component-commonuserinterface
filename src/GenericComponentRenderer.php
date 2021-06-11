<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class GenericComponentRenderer {

	/**
	 *
	 * @var ComponentRendererFactory
	 */
	private $renderFactory = null;

	/**
	 *
	 * @var array
	 */
	private $componentTree = [];

	/**
	 *
	 * @var array
	 */
	private $templateDataTree = [];

	/**
	 *
	 * @param ComponentRendererFactory $renderFactory
	 */
	public function __construct( $renderFactory ) {
		$this->renderFactory = $renderFactory;
	}

	/**
	 * @param array $componentTree
	 * @return string
	 */
	public function getHtml( $componentTree ) : string {
		$this->makeTemplateDataTree();
		$this->renderTemplateDataTree();

		return $this->html;
	}

	/**
	 * Example:
	 * [
	 *	'renderer' => 'panel',
	 *	'data' => [
	 *		'id' => 'my-panel',
	 *		'header' => 'My card',
	 *		'items' => [
	 *			[
	 *				'renderer' => 'literal',
	 *				'data' => [
	 *					'id' => 'my-literal',
	 *					'text' => 'Hello World!'
	 *				]
	 *			],
	 *			[
	 *				'renderer' => 'button',
	 *				'data' => [
	 *					'id' => 'my-button',
	 *					'label' => 'Hello World!'
	 *				]
	 *			]
	 *		]
	 *	],
	 * ]
	 *
	 * @return void
	 */
	private function makeTemplateDataTree() {
		foreach( $this->componentTree as $node ) {
			$component = $node['component'];

			$rendererKey = $this->renderFactory->getKey( $component );
			$renderer = $this->renderFactory->getRenderer( $rendererKey );
			$templateData = $renderer->getTemplateData( $component );
			$dataNode = [
				'renderer' => $rendererKey,
				'data' => $templateData
			];
			$this->templateDataTree[] = $dataNode;
		}
	}

	private function renderTemplateDataTree() {

	}

}
