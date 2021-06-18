<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class RendererDataTreeBuilder {

	/**
	 *
	 * @var ComponentRendererFactory
	 */
	private $rendererFactory = null;

	/**
	 *
	 * @var array
	 */
	private $templateDataTree = [];

	public function __construct( $rendererFactory ) {
		$this->rendererFactory = $rendererFactory;
	}

	/**
	 * Example return:
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
	 * @param array $componentTree e.g. [
	 *   'my-panel' => [
	 *     'component' => <object>:IComponent,
	 *     'subComponents' => [
	 *       'my-literal' => [
	 *         'component' => <object>:IComponent,
	 *         'subComponents' => []
	 *       ],
	 *       'my-button' => [
	 *         'component' => <object>:IComponent,
	 *         'subComponents' => []
	 *       ]
	 *     ]
	 *   ]
	 * ];
	 * @return array
	 */
	public function getRendererDataTree( $componentTree ) {
		foreach( $componentTree as $node ) {
			$component = $node['component'];

			$rendererKey = $this->rendererFactory->getKey( $component );
			$renderer = $this->rendererFactory->getRenderer( $rendererKey );
			$templateData = $renderer->getTemplateData( $component );
			$dataNode = [
				'renderer' => $rendererKey,
				'data' => $templateData
			];
			$this->templateDataTree[] = $dataNode;
		}
die();
		return $this->templateDataTree;
	}
}