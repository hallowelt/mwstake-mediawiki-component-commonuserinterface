<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface ILinkTarget {

	/**
	 * An empty string uses the configured external-link target.
	 *
	 * @return string
	 */
	public function getTarget(): string;
}
