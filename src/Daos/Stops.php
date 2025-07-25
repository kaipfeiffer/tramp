<?php

namespace Kaipfeiffer\Tramp\Daos;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Stops extends AbstractDAO
{
    /**
     * The table columns
     *
     * @since   1.0.1
     */
    protected $columns  = array(
        'id' => '%d',
        'location_id' => '%d',
        'stopname' => '%s',
        'stoptype' => '%d',
        'created' => '%s',
        'updated' => '%s',
        'deleted' => '%s',
    );


    /**
     * The table columns
     * 
     * @since   1.0.1
     */
    protected $column_types  = array(
        'id' => array('type' => 'int', 'length' => 16, 'signed' => false, 'null' => false, 'autoincrement' => true),
        'location_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'stopname' => array('type' => 'string','length' => 100,),
        'stoptype' => array('type' => 'int', 'length' => 10, 'signed' => false, 'null' => false),
        'created' => array('type' => 'datetime'),
        'updated' => array('type' => 'datetime'),
        'deleted' => array('type' => 'datetime'),
    );


    /**
     * hidden columns
     *
     * @var     array
     * @since   1.0.0
     */
    protected $hidden_columns = array(
        'created'       => null,
        'deleted'       => null,
        'updated'       => null,
    );


    /**
     * List of keys
     *
     * @since   1.0.1
     */
    protected $keys = array(array('stopname'),array('location_id'));


    /**
     * List of unique keys
     *
     * @since   1.0.1
     */
    protected $unique_keys = array();


    /**
     * The name of the primary column
     *
     * @since   1.0.1
     */
    protected $primary_key = 'id';


    /**
     * The associated tablename
     *
     * @since   1.0.1
     */
    protected $tablename = 'stops';
}
