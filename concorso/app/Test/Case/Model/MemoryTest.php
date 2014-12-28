<?php
App::uses('Memory', 'Model');

/**
 * Memory Test Case
 *
 */
class MemoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.memory',
		'app.user',
		'app.points_user',
		'app.refus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Memory = ClassRegistry::init('Memory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Memory);

		parent::tearDown();
	}

}
