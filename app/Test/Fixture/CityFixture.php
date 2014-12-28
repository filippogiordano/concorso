<?php
/**
 * CityFixture
 *
 */
class CityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => 'codice istat', 'charset' => 'latin1'),
		'comune' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'district_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'comune' => array('column' => 'comune', 'unique' => 1),
			'cities_ibfk_1' => array('column' => 'district_id', 'unique' => 0)
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
			'id' => 'Lore',
			'comune' => 'Lorem ipsum dolor sit amet',
			'district_id' => 1
		),
	);

}
