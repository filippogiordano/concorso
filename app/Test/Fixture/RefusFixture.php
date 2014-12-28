<?php
/**
 * RefusFixture
 *
 */
class RefusFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'type_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'kg' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'costcenter_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'note' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'type_id' => array('column' => 'type_id', 'unique' => 0),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'costcenter_id' => array('column' => 'costcenter_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'type_id' => 'Lore',
			'kg' => 1,
			'costcenter_id' => 'Lorem ip',
			'created' => '2014-11-16 13:22:05',
			'modified' => '2014-11-16 13:22:05',
			'user_id' => 1,
			'note' => 'Lorem ipsum dolor sit amet'
		),
	);

}
