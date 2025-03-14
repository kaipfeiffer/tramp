<?php

namespace Kaipfeiffer\Tramp\Abstracts;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;

/**
 * Abstract Static Class for Database-Access via wpdb
 *
 * @author  Kai Pfeiffer <kp@loworx.com>
 * @package ridepool
 * @since   1.0.0 
 */

abstract class AbstractDAO

{
    protected $db;

    
    /**
     * The table columns
     *
     * @var     array
     * @since   1.0
     */
    protected $columns;


    /**
     * The table columns
     *
     * @var     array
     * @since   1.0
     */
    protected $column_types;


    /**
     * List of keys
     *
     * @var     array
     * @since   1.0
     */
    protected $keys;


    /**
     * The name of the primary column
     *
     * @var     string
     * @since   1.0
     */
    protected $primary_key;


    /**
     * List of unique keys
     *
     * @var     array
     * @since   1.0
     */
    protected $unique_keys;


    /**
     * The associated tablename
     *
     * @var     string
     * @since   1.0
     */
    protected $tablename;


    /**
     * constructor
     * 
     * @param DAOConnector
     */
    public function __construct(DAOConnector $db)
    {
        $this->db   = $db;
    }


    /**
     * create row
     * 
     * @param   array
     */
    public function create(array $row) {}

    
    /**
     * delete row
     * 
     * @param   array
     */
    public function delete(array $row) {}


    /**
     * create table
     * 
     */
    function create_table()
    {
        $data   = array(
            'column_types'  => $this->column_types,
            'keys'  => $this->keys ?? array(),
            'unique_keys'   => $this->unique_keys ?? array(),
            'primary_key'   => $this->primary_key ?? null,
            'tablename' => $this->tablename,
        );

        $result = $this->db->create_table($data);
        return $result;
    }

    
    /**
     * read row
     * 
     * @param   integer
     * @param   integer
     */
    public function read(int $id = null, int $page = null)
    {
        return $this->db->table($this->tablename)->read();
    }

    
    /**
     * read row by query
     * 
     * @param   array
     * @param   integer
     */
    public function read_by(array $query, int $page = null) {}

    
    /**
     * updaterow
     * 
     * @param   array
     */
    public function update(array $row) {}
}
