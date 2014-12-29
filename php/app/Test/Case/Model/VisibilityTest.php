<?php
App::uses('Visibility', 'Model');

/**
 * Visibility Test Case
 *
 */
class VisibilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.visibility'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Visibility = ClassRegistry::init('Visibility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Visibility);

		parent::tearDown();
	}

}
