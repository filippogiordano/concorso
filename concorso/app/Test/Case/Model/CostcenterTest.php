<?php
App::uses('Costcenter', 'Model');

/**
 * Costcenter Test Case
 *
 */
class CostcenterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.costcenter',
		'app.point',
		'app.refus',
		'app.type',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Costcenter = ClassRegistry::init('Costcenter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Costcenter);

		parent::tearDown();
	}

}
