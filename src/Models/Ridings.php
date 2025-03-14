<?php

namespace Kaipfeiffer\Tramp\Models;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Ridings extends AbstractDAO
{
    /**
     * The table columns
     *
     * @var     array
     * @since   1.0
     */
    protected $columns  = array(
        'id' => '%d',
        'passenger_id' => '%d',
        'driver_id' => '%d',
        'origin_id' => '%d',
        'destination_id' => '%d',
        'passengers' => '%d',
        'description' => '%s',
        'remarks' => '%s',
        'start_date' => '%s',
        'end_date' => '%s',
        'owner' => '%s',
        'created' => '%s',
        'updated' => '%s',
        'deleted' => '%s',
    );


    /**
     * The table columns
     *
     * @var     array
     * @since   1.0
     */
    protected $column_types  = array(
        'id' => array('type' => 'int', 'length' => 16, 'signed' => false, 'null' => false, 'autoincrement' => true),
        'passenger_id' => array('type' => 'int', 'length' => 16, 'signed' => false, 'null' => true,  'autoincrement' => true),
        'driver_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'origin_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'destination_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'passengers' => array('type' => 'int', 'length' => 2, 'signed' => false),
        'description' => array('type' => 'string',),
        'start_date' => array('type' => 'datetime'),
        'end_date' => array('type' => 'datetime'),
        'owner' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'status' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'created' => array('type' => 'datetime'),
        'updated' => array('type' => 'datetime'),
        'deleted' => array('type' => 'datetime'),
    );


    /**
     * List of keys
     *
     * @var     array
     * @since   1.0
     */
    protected $keys = array();


    /**
     * The name of the primary column
     *
     * @var     string
     * @since   1.0
     */
    protected $primary_key = 'id';


    /**
     * List of unique keys
     *
     * @var     array
     * @since   1.0
     */
    protected $unique_keys = array();


    /**
     * The associated tablename
     *
     * @var     string
     * @since   1.0
     */
    protected $tablename = 'ridings';
}
