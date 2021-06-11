<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface;

interface IComponentRenderer {

	/**
	 * Used for serverside rendering
	 *
	 * @param array $data Data extracted from `IComponentRenderer::getTemplateData`
	 * @return string
	 */
	public function getHtml( $data ) : string;

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

	/**
	 * Used to convert component object into an array of simple data that can be rendered into HTML
	 * Maybe called for serverside rendering or by an API module to send templatedata on the wire to
	 * a clientside renderer
	 *
	 * @param object $object Must implement a component interface that has
	 * a renderer registered in `$mwsgCommonUIComponentRendererRegistry`
	 *
	 * @return array
	 */
	public function getTemplateData( $object ) : array;
}
