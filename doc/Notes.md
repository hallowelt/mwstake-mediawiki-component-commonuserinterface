Hook `SkinTemplateNavigation::Universal` allows to load RL modules/styles!
Hook `BeforePageDisplay` allows load RL modules/style but comes before `SkinTemplateNavigation::Universal`
Hook `SkinTemplateOutputPageBeforeExec` allows to add "template data" but does not allow to load RL modulaes/styles; Also it is deprecated!
Skins using new `SkinMustache` class have no way to inject/modify mustache-template data