<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

class CardTitle extends CardHeader {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-title.mustache';
	}

}
