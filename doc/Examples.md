In the `LocalSettings.php` add

```php
// Spec
$GLOBALS['mwsgCommonUISkinSlots']['skinAfterContent']['my-skinaftercontent-panel'] = [
	'factory' => function() {
		return new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimplePanel( [
			'label' => new RawMessage( 'My panel' ),
			'items' => [
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal', 'Hello World!'),
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleButton( [
					'id' => 'my-button',
					'label' => new RawMessage( 'My panel' )
				] )
			]
		] );
	}
];

$GLOBALS['mwsgCommonUISkinSlots']['skinAfterContent']['my-skinaftercontent-accordion'] = [
	'factory' => function() {
		return new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleAccordion( [
			'items' => [
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleAccordionItem([
					'id' => 'item-1',
					'header-text' => new RawMessage( 'Item 1' ),
					'items' => [
						new MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal3', 'Hello World!')
					]
				] ),
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleAccordionItem([
					'id' => 'item-2',
					'header-text' => new RawMessage( 'Item 2' ),
					'items' => [
						new MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal4', 'Hello World!')
					]
				] ),
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleAccordionItem([
					'id' => 'item-3',
					'header-text' => new RawMessage( 'Item 3' ),
					'items' => [
						new MWStake\MediaWiki\Component\CommonUserInterface\Component\Literal( 'my-literal5', 'Hello World!')
					]
				] )
			]
		] );
	}
];
```