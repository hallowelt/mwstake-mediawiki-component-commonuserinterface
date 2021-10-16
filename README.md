## MediaWiki Stakeholders Group - Components
# CommonUserInterface for MediaWiki

Provides common user interface elements and customizeable stylings

## Components and Renderers

Default renderer types:
- `*`
- `bootstrap-5`

A skin may define

```php
$GLOBALS['mwsgCommonUIComponentRendererType'] = 'bootstrap-5';
```
if it provides "Twitter Bootstrap V5". The "CommonUserInterface" will fall back to `*` of the requested renderer is not available to the chosen type.


### Custom renderers
```php
$GLOBALS['mwsgCommonUIComponentRendererRegistry']['my-custom-renderer']['button'] = '...';
```

## Skin Slots

Default slots:
- `siteNoticeAfter`: Uses hook `SiteNoticeAfter` to add components to any default skin
- `dataAfterContent`: Uses hook `SkinAfterContent` to add components to any default skin

Examples:

```php
$GLOBALS['mwsgCommonUISkinSlots']['siteNoticeAfter']['my-sitenoticeafter-toolbar'] = [
	'factory' => function() {
		return new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleToolbar( [
			'items' => [
				new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimpleDropDown( [
					'label' => new RawMessage( 'Click me!' ),
					'toggleRLModules' => [ 'my-dropdown-module' ]
				] )
			]
		] );
	}
];

$GLOBALS['mwsgCommonUISkinSlots']['skinAfterContent']['my-skinaftercontent-panel'] = [
	'factory' => function() {
		return new MWStake\MediaWiki\Component\CommonUserInterface\Component\SimplePanel( [
			'title' => new RawMessage( 'My panel' ),
			'collapsible' => true,
			'collapsed' => true,
			'expandRLModules' => [ 'my-panel-module' ]
		] );
	}
];
```

# TODO

### Client side rendering

Example:
```javascript
mws.commonui.renderPath( '<skinslot>/<parentComponentId>/<subComponentId>', $container );
```
