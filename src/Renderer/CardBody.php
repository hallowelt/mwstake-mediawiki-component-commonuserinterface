<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer;

class CardBody extends CardHeader {

	/**
	 * @return string
	 */
	public function getTemplatePathname() : string {
		return $this->templateBasePath . 'card-body.mustache';
	}

}
