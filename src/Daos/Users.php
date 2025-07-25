<?php

namespace Kaipfeiffer\Tramp\Daos;

use Kaipfeiffer\Tramp\Abstracts\AbstractDAO;

class Users extends AbstractDAO
{
    /**
     * The table columns
     *
     * @since   1.0.1
     */
    protected $columns  = array(
        'id' => '%d',
        'location_id' => '%d',
        'hub_id' => '%d',
        'title' => '%s',
        'givenname' => '%s',
        'familyname' => '%s',
        'birthday' => '%s',
        'email'  => '%s',
        'phone'  => '%s',
        'cell'  => '%s',
        'identity_card_number'  => '%s',
        'identity_card_validity'  => '%s',
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
        'hub_id' => array('type' => 'int', 'length' => 16, 'signed' => false),
        'title' =>  array('type' => 'string','length' => 50,),
        'givenname' =>  array('type' => 'string','length' => 100,),
        'familyname' => array('type' => 'string','length' => 100,),
        'birthday' => array('type' => 'date'),
        'email'  => array('type' => 'string','length' => 200,),
        'phone'  => array('type' => 'string','length' => 32,),
        'cell'  => array('type' => 'string','length' => 32,),
        'identity_card_number'  => array('type' => 'string','length' => 32,),
        'identity_card_validity'  => array('type' => 'date'),
        'created' => array('type' => 'datetime'),
        'updated' => array('type' => 'datetime'),
        'deleted' => array('type' => 'datetime'),
    );


    /**
     * The table columns
     *
     * @var     array
     * @since   1.0.0
     */
    protected $hidden_columns = array(
        'created'       => null,
        'deleted'       => null,
        'location_id'   => null,
        'hub_id'        => null,
        'id'            => null,
        'status'        => null,
        'updated'       => null,
    );


    /**
     * List of keys
     *
     * @since   1.0.1
     */
    protected $keys = array(array('familyname'),array('hub_id'));


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
    protected $tablename = 'tramps';
}
