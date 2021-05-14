<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Components\Base;

use MWStake\MediaWiki\Component\CommonUserInterface\Interfaces\IComponent;
use TemplateParser;

class ComponentBase implements IComponent {
	/**
	 * @return string
	 */
	public function getHtml()
	{
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
