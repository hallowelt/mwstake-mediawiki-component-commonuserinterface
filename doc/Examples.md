In the `LocalSettings.php` add

```php
// Spec
$GLOBALS['mwsgCommonUISkinSlots']['skinAfterContent']['my-skinaftercontent-panel'] = [
	'factory' => function() {
		return new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimplePanel( [
			'id' => 'my-panel',
			'label' => new RawMessage( 'My panel' ),
			'items' => [
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal', 'Hello World!'),
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleButton( [
					'id' => 'my-button',
					'label' => new RawMessage( 'My Button' )
				] ),
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\DropdownItemlist( 'my-dd', [
					'link1' => [
						'text' => 'Test',
						'title' => 'Klick mich',
						'href' => 'https://google.de',
						'class' => 'class1 class2',
					],
					'link2' => [
						'text' => 'Test',
						'title' => 'Klick mich',
						'href' => 'https://google.de',
						'class' => 'class1 class2',
					]
				] )
			]
		] );
	}
];
```