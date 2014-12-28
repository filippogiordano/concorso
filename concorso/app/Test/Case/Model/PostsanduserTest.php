<?php
App::uses('Postsanduser', 'Model');

/**
 * Postsanduser Test Case
 *
 */
class PostsanduserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.postsanduser',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postsanduser = ClassRegistry::init('Postsanduser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postsanduser);

		parent::tearDown();
	}

}
