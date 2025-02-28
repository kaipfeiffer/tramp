<?php

namespace Kaipfeiffer\Tramp\Models;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Ridings extends AbstractDAO
{
    /**
     * The table columns
     *
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
     * @since   1.0
     */
    protected $column_types  = array(
        'id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'passenger_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'driver_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'origin_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'destination_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'passengers' => array('type' => 'int', 'length' => 2, 'signed' => false),
        'description' => array('type' => 'bigint', 'signed' => false),
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
     * @since   1.0
     */
    protected static $keys = array();


    /**
     * List of unique keys
     *
     * @since   1.0
     */
    protected static $unique_keys = array();


    /**
     * The name of the primary column
     *
     * @since   1.0
     */
    protected static $primary_key = 'id';


    /**
     * The associated tablename
     *
     * @since   1.0
     */
    protected $tablename = 'ridings';

    function create_table_data()
    {
        $data   = array(
            'column_types'  => $this->column_types,
            'keys'  => $this->keys,
            'unique_keys'   => $this->unique_keys,
            'primary_key'   => $this->primary_key,
            'tablename' => $this->tablename,
        );

        return $data;
    }
}