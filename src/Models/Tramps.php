<?php

namespace Kaipfeiffer\Tramp\Models;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Tramps extends AbstractDAO
{
    /**
     * The table columns
     *
     * @since   1.0
     */
    protected $columns  = array(
        'id' => '%d',
        'title' => '%s',
        'givenname' => '%s',
        'familyname' => '%s',
        'street' => '%s',
        'zipcode' => '%s',
        'city' => '%s',
        'region' => '%s',
        'country' => '%s',
        'latitude' => '%f',
        'longitude' => '%f',
        'birthday' => '%s',
        'identity_card_number'  => '%s',
        'identity_card_validity'  => '%s',
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
        'id' => array('type' => 'int', 'length' => 16, 'signed' => false, 'null' => false, 'autoincrement' => true),
        'title' =>  array('type' => 'string','length' => 50,),
        'givenname' =>  array('type' => 'string','length' => 100,),
        'familyname' => array('type' => 'string','length' => 100,),
        'street' => array('type' => 'string','length' => 100,),
        'zipcode' => array('type' => 'string','length' => 10,),
        'city' => array('type' => 'string','length' => 200,),
        'region' => array('type' => 'string','length' => 100,),
        'country' => array('type' => 'string','length' => 100,),
        'latitude' => array('type' => 'float',),
        'longitude' => array('type' => 'float',),
        'birthday' => array('type' => 'date'),
        'identity_card_number'  => array('type' => 'string','length' => 32,),
        'identity_card_validity'  => array('type' => 'date'),
        'created' => array('type' => 'datetime'),
        'updated' => array('type' => 'datetime'),
        'deleted' => array('type' => 'datetime'),
    );


    /**
     * List of keys
     *
     * @since   1.0
     */
    protected $keys = array(array('familyname'),array('latitude','longitude'));


    /**
     * List of unique keys
     *
     * @since   1.0
     */
    protected $unique_keys = array();


    /**
     * The name of the primary column
     *
     * @since   1.0
     */
    protected $primary_key = 'id';


    /**
     * The associated tablename
     *
     * @since   1.0
     */
    protected $tablename = 'tramps';
}
