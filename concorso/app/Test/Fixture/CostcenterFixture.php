<?php
/**
 * CostcenterFixture
 *
 */
class CostcenterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'descrizione' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tipologia' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'identificativo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contatore' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'point_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'hsp_cod_struttura' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hsp_sub_cod_struttura' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sts' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'valido_dal' => array('type' => 'date', 'null' => false, 'default' => null),
		'valido_al' => array('type' => 'date', 'null' => false, 'default' => '9999-12-31'),
		'note' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'uo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'costcenters_ibfk_1' => array('column' => 'point_id', 'unique' => 0)
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
			'id' => 'Lorem ip',
			'descrizione' => 'Lorem ipsum dolor sit amet',
			'tipologia' => '',
			'identificativo' => '',
			'contatore' => 'Lorem ipsum dolor sit ame',
			'point_id' => 1,
			'hsp_cod_struttura' => 'Lore',
			'hsp_sub_cod_struttura' => '',
			'sts' => 'Lore',
			'valido_dal' => '2014-11-16',
			'valido_al' => '2014-11-16',
			'note' => 'Lorem ipsum dolor sit amet',
			'uo' => 'L'
		),
	);

}
