<?php
/**
 * ConnectionFixture
 *
 */
class ConnectionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'device_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_time' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'end_time' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'device_id' => 1,
			'ip' => 'Lorem ipsum d',
			'start_time' => 1367338064,
			'end_time' => 1367338064
		),
	);

}
