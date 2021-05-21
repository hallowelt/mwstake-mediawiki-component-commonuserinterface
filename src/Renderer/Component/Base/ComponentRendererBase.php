<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Renderer\Component\Base;

use MWStake\MediaWiki\Component\CommonUserInterface\Interfaces\IComponentRenderer;
use TemplateParser;

class ComponentRendererBase implements IComponentRenderer {
	/**
	 * @return string
	 */
	public function getHtml() {
		$templateParser = new TemplateParser(
			$this->getTemplatePath()
		);
		$templateParser->enableRecursivePartials(false);

		$html = $templateParser->processTemplate(
			$this->getTemplateName(),
			$this->getParams()
		);

		return $html;
	}
}
