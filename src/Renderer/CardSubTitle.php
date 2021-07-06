<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

class CardSubTitle extends CardHeader {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-subtitle.mustache';
	}

}
