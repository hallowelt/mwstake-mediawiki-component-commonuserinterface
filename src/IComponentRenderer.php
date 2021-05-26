<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IComponentRenderer {

	/**
	 *
	 * @param object $object Must implement a component interface that has
	 * a renderer registered in `$mwsgCommonUIComponentRendererRegistry`
	 * @return string
	 */
	public function getHtml( $object ) : string;

	/**
	 * If a component gets rendered in the inital page load these
	 * RL modules will be loades automatically
	 * @return array
	 */
	public function getRLModules() : array;

	/**
	 * If a component gets rendered in the inital page load these
	 * RL module styles will be loades automatically
	 * @return array
	 */
	public function getRLModuleStyles(): array;

	/**
	 * This is used to compile a clientside renderer. It will also load
	 * RL modules from `getRLModules` and `getRLModuleStyles`
	 * @return string
	 */
	public function getTemplatePath(): string;
}