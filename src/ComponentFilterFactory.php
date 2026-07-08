<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

use Wikimedia\ObjectFactory\ObjectFactory;

class ComponentFilterFactory {

	/** @var array */
	private $registeredFilters = [];

	/** @var ObjectFactory */
	private $objectFactory;

	/**
	 * Cached filter instances. Filters are stateless, so they can be reused.
	 *
	 * @var IComponentFilter[]|null
	 */
	private $filterCache = null;

	/**
	 *
	 * @param array $filters
	 * @param ObjectFactory $objectFactory
	 */
	public function __construct( array $filters, ObjectFactory $objectFactory ) {
		$this->registeredFilters = $filters;
		$this->objectFactory = $objectFactory;
	}

	/**
	 *
	 * @return IComponentFilter[]
	 */
	public function getAllFilters() {
		if ( $this->filterCache === null ) {
			$this->filterCache = [];
			foreach ( $this->registeredFilters as $key => $spec ) {
				$this->filterCache[$key] = $this->objectFactory->createObject( $spec );
			}
		}

		return $this->filterCache;
	}

}
