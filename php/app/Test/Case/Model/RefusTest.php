<?php
App::uses('Refus', 'Model');

/**
 * Refus Test Case
 *
 */
class RefusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.refus',
		'app.type',
		'app.costcenter',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Refus = ClassRegistry::init('Refus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Refus);

		parent::tearDown();
	}

}
