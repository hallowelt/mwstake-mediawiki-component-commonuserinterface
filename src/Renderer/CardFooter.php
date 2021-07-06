<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

class CardFooter extends CardHeader {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-footer.mustache';
	}

}
