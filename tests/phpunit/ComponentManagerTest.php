<?php

namespace MWStake\MediaWiki\Component\CommonUserInterface\Tests;

use IContextSource;
use MWStake\MediaWiki\Component\CommonUserInterface\ComponentManager;
use MWStake\MediaWiki\Component\CommonUserInterface\IComponent;
use MWStake\MediaWiki\Component\CommonUserInterface\IContainerComponent;
use PHPUnit\Framework\TestCase;

class ComponentManagerTest extends TestCase {

	/**
	 * @covers ComponentManager::init
	 *
	 * @return void
	 */
	public function testInit() {

		// Sub component that should render
		$mockSubComponent1 = $this->createMock( IComponent::class );
		$mockSubComponent1->expects( $this->once() )->method( 'getId' );
		$mockSubComponent1->expects( $this->once() )->method( 'getRequiredRLModules' );
		$mockSubComponent1->expects( $this->once() )->method( 'getRequiredRLStyles' );
		$mockSubComponent1->expects( $this->once() )->method( 'getSubComponents' );
		$mockSubComponent1->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( true );

		// Sub component that should not render
		$mockSubComponent2 = $this->createMock( IComponent::class );
		$mockSubComponent2->expects( $this->never() )->method( 'getId' );
		$mockSubComponent2->expects( $this->never() )->method( 'getRequiredRLModules' );
		$mockSubComponent2->expects( $this->never() )->method( 'getRequiredRLStyles' );
		$mockSubComponent2->expects( $this->never() )->method( 'getSubComponents' );
		$mockSubComponent2->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( false );

		// Component in an enabled slot
		$mockComponent1 = $this->createMock( IComponent::class );
		$mockComponent1->expects( $this->once() )->method( 'getId' );
		$mockComponent1->expects( $this->once() )->method( 'getRequiredRLModules' );
		$mockComponent1->expects( $this->once() )->method( 'getRequiredRLStyles' );
		$mockComponent1->expects( $this->once() )->method( 'getSubComponents' )
			->willReturn( [ $mockSubComponent1, $mockSubComponent2 ] );
		$mockComponent1->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( true );

		// Component in a not enabled slot
		$mockComponent2 = $this->createMock( IComponent::class );
		$mockComponent2->expects( $this->never() )->method( 'getId' );
		$mockComponent2->expects( $this->never() )->method( 'getRequiredRLModules' );
		$mockComponent2->expects( $this->never() )->method( 'getRequiredRLStyles' );
		$mockComponent2->expects( $this->never() )->method( 'getSubComponents' );
		$mockComponent2->expects( $this->never() )->method( 'shouldRender' );

		$slots = [];
		$slots[ 'testSlot1' ] = [
			'test1' => [
				'factory' => function() use ( $mockComponent1 ) {
					return $mockComponent1;
				}
			],
		];
		$slots[ 'testSlot2' ] = [
			'test1' => [
				'factory' => function() use ( $mockComponent2 ) {
					return $mockComponent2;
				}
			]
		];

		$enabledSlots = [ 'testSlot1' ];
		$mockContext = $this->createMock( IContextSource::class );

		$manager = new ComponentManager( $mockContext, $slots, $enabledSlots );
		$manager->init();
	}

	/**
	 * @covers ComponentManager::getRequiredRLModules
	 *
	 * @return void
	 */
	public function testGetRequiredRLModules() {
		// Some sub component that will add to RL modules
		$mockSubComponent1 = $this->createMock( IComponent::class );
		$mockSubComponent1->expects( $this->once() )
			->method( 'getRequiredRLModules' )->willReturn( [ 'module2', 'module3' ] );
		$mockSubComponent1->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( true );

		// Component in an enabled slot
		$mockComponent1 = $this->createMock( IComponent::class );
		$mockComponent1->expects( $this->once() )
			->method( 'getRequiredRLModules' )->willReturn( [ 'module1', 'module2' ] );
		$mockComponent1->expects( $this->once() )
			->method( 'getSubComponents' )->willReturn( [ $mockSubComponent1 ] );
		$mockComponent1->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( true );

		$slots = [];
		$slots[ 'testSlot1' ] = [
			'test1' => [
				'factory' => function() use ( $mockComponent1 ) {
					return $mockComponent1;
				}
			],
		];

		$enabledSlots = [ 'testSlot1' ];
		$mockContext = $this->createMock( IContextSource::class );

		$manager = new ComponentManager( $mockContext, $slots, $enabledSlots );
		$manager->init();

		$expectedRLModules = [ 'module1', 'module2', 'module3' ];
		$this->assertEquals( $expectedRLModules, $manager->getRLModules() );
	}

	/**
	 * @covers ComponentManager::getRequiredRLModules
	 *
	 * @return void
	 */
	public function testGetRequiredRLStyles() {
		// Some sub component that will add to RL modules
		$mockSubComponent1 = $this->createMock( IComponent::class );
				$mockSubComponent1->expects( $this->once() )
			->method( 'getRequiredRLStyles' )->willReturn( [ 'module2', 'module3' ] );
		$mockSubComponent1->expects( $this->once() )->method( 'getSubComponents' );
		$mockSubComponent1->expects( $this->once() )
			->method( 'shouldRender' )->willReturn( true );

		// Component in an enabled slot
		$mockComponent1 = $this->createMock( IComponent::class );
		$mockComponent1->expects( $this->once() )
			->method( 'getRequiredRLStyles' )->willReturn( [ 'module1', 'module2' ] );
		$mockComponent1->method( 'getSubComponents' )->willReturn( [ $mockSubComponent1 ] );
		$mockComponent1->method( 'shouldRender' )->willReturn( true );

		$slots = [];
		$slots[ 'testSlot1' ] = [
			'test1' => [
				'factory' => function() use ( $mockComponent1 ) {
					return $mockComponent1;
				}
			],
		];

		$enabledSlots = [ 'testSlot1' ];
		$mockContext = $this->createMock( IContextSource::class );

		$manager = new ComponentManager( $mockContext, $slots, $enabledSlots );
		$manager->init();

		$expectedRLModules = [ 'module1', 'module2', 'module3' ];
		$this->assertEquals( $expectedRLModules, $manager->getRLModuleStyles() );
	}
}