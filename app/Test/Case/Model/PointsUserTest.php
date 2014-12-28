<?php
App::uses('PointsUser', 'Model');

/**
 * PointsUser Test Case
 *
 */
class PointsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.points_user',
		'app.point',
		'app.city',
		'app.district',
		'app.costcenter',
		'app.refus',
		'app.type',
		'app.user',
		'app.users_to_point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PointsUser = ClassRegistry::init('PointsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PointsUser);

		parent::tearDown();
	}

}
