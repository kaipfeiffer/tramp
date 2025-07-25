<?php

namespace Kaipfeiffer\Tramp\Daos;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Locations extends AbstractDAO
{
    /**
     * The table columns
     *
     * @since   1.0.1
     */
    protected $columns  = array(
        'id' => '%d',
        'status' => '%d',
        'street' => '%s',
        'zipcode' => '%s',
        'city' => '%s',
        'region' => '%s',
        'country' => '%s',
        'latitude' => '%f',
        'longitude' => '%f',
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
        'status' => array('type' => 'int', 'length' => 16, 'signed' => false,),
        'street' => array('type' => 'string','length' => 100,),
        'zipcode' => array('type' => 'string','length' => 10,),
        'city' => array('type' => 'string','length' => 200,),
        'region' => array('type' => 'string','length' => 100,),
        'country' => array('type' => 'string','length' => 100,),
        'latitude' => array('type' => 'float',),
        'longitude' => array('type' => 'float',),
        'created' => array('type' => 'datetime'),
        'updated' => array('type' => 'datetime'),
        'deleted' => array('type' => 'datetime'),
    );


    /**
     * List of keys
     *
     * @since   1.0.1
     */
    protected $keys = array(array('city'),array('latitude','longitude'));


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
    protected $tablename = 'locations';
}
