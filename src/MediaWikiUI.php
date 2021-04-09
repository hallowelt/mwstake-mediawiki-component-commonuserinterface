<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

class MediaWikiUI {
	protected static $instance = null;

	/** @var array  */
	protected $vars = [];

	/**
	 * @return static;
	 */
	public static function getInstance() {
		if ( static::$instance === null ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function enableMediWikiUITheme() {
		$GLOBALS['wgResourceModules'] = array_replace(
			$GLOBALS['wgResourceModules'],
			$this->resourceModules()
		);
	}

	private function resourceModules() {
		$localPath = 'vendor/mwstake/mediawiki-component-commonuserinterface/resources/mediawiki';

		return [
			'mediawiki.ui' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/default.less',
					],
				],
				'targets' => ['desktop', 'mobile']
			],
			'mediawiki.ui.checkbox' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/checkbox.less',
					],
				],
				'targets' => ['desktop', 'mobile']
			],
			'mediawiki.ui.radio' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/radio.less',
					],
				],
				'targets' => ['desktop', 'mobile'],
			],
			'mediawiki.ui.anchor' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/anchors.less',
					],
				],
				'targets' => ['desktop', 'mobile'],
			],
			'mediawiki.ui.button' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/buttons.less',
					],
				],
				'targets' => ['desktop', 'mobile'],
			],
			'mediawiki.ui.input' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/inputs.less',
					],
				],
				'targets' => ['desktop', 'mobile'],
			],
			'mediawiki.ui.icon' => [
				'skinStyles' => [
					'default' => [
						$localPath . '/mediawiki.ui/components/icons.less',
					],
				],
				'targets' => ['desktop', 'mobile'],
			]
		];
	}
}
