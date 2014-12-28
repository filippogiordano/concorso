<?php
App::uses('UsersToPoint', 'Model');

/**
 * UsersToPoint Test Case
 *
 */
class UsersToPointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_to_point',
		'app.point',
		'app.city',
		'app.district',
		'app.costcenter',
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
		$this->UsersToPoint = ClassRegistry::init('UsersToPoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersToPoint);

		parent::tearDown();
	}

}
