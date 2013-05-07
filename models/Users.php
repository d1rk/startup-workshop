<?php

class Users extends \lithium\data\Model {

	protected $_meta = array(
		'connection' => false,
		'initialized' => true,
	);

	/**
	 * Stores the data schema.
	 *
	 * @see lithium\data\Model
	 */
	protected $_schema = array(
		'_id'  => array('type' => 'id'),
		'name' => array('type' => 'string', 'default' => '', 'null' => false),
		'email' => array('type' => 'string', 'default' => '', 'null' => false),
		'via' => array('type' => 'string', 'default' => 'startup-workshop', 'null' => false),
		'created' => array('type' => 'datetime', 'default' => '', 'null' => false),
		'updated' => array('type' => 'datetime'),
		'deleted' => array('type' => 'datetime'),
	);

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validates = array(
		'_id' => array(
			array('notEmpty', 'message' => 'a unique _id is required.', 'last' => true, 'on' => 'update'),
		),
		'email' => array(
			array('notEmpty', 'message' => 'email address is required.', 'last' => true),
			array('email', 'message' => 'email address must be valid.', 'last' => true),
		),
	);
}

?>