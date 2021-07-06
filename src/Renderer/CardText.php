<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

class CardText extends CardHeader {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-text.mustache';
	}

}
