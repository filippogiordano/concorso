<?php
/**
 * VisibilityFixture
 *
 */
class VisibilityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'point_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'city_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'comment' => 'codice istat', 'charset' => 'latin1'),
		'district_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_id' => 1,
			'point_id' => 1,
			'city_id' => 'Lore',
			'district_id' => 1
		),
	);

}
