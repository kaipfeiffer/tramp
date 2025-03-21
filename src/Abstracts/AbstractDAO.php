<?php

namespace Kaipfeiffer\Tramp\Abstracts;

use Kaipfeiffer\Tramp\Interfaces\DaoConnectorInterface;
use Kaipfeiffer\Tramp\Interfaces\DaoModelInterface;

/**
 * Abstract Static Class for Database-Access via wpdb
 *
 * @author  Kai Pfeiffer <kp@loworx.com>
 * @package ridepool
 * @since   1.0.0 
 */

abstract class AbstractDAO implements DaoModelInterface

{
    protected $db;


    /**
     * The table columns
     *
     * @var     array
     * @since   1.0.0
     */
    protected $columns;


    /**
     * The table columns
     *
     * @var     array
     * @since   1.0.0
     */
    protected $column_types;


    /**
     * List of keys
     *
     * @var     array
     * @since   1.0.0
     */
    protected $keys;


    /**
     * The name of the primary column
     *
     * @var     string
     * @since   1.0.0
     */
    protected $primary_key;


    /**
     * List of unique keys
     *
     * @var     array
     * @since   1.0.0
     */
    protected $unique_keys;


    /**
     * The associated tablename
     *
     * @var     string
     * @since   1.0.0
     */
    protected $tablename;


    /**
     * PROTECTED METHODS
     */


    /**
     * default_values
     * 
     * @return   array
     * @since   1.0.0
     */
    protected function default_values(){
        return array();
    }


    /**
     * on_update_values
     * 
     * @return   array
     * @since   1.0.0
     */
    protected function on_update_values(){
        return array();
    }


    /**
     * PUBLIC METHODS
     */

    /**
     * constructor
     * 
     * @param DAOConnector
     * @since   1.0.0
     */
    public function __construct(DAOConnectorInterface $db)
    {
        $this->db   = $db;
    }


    /**
     * create row
     * 
     * @param   array
     * @since   1.0.0
     */
    public function create(array $row):?int
    {
        $sanitized  = $this->default_values();

        foreach ($row as $key => $value) {
            if (isset($this->columns[$key])) {
                $sanitized[$key]    = sprintf($this->columns[$key], $value);
            }
        }
        $result = $this->db->table($this->tablename)->create($sanitized);
        return $result;
    }


    /**
     * delete row
     * 
     * @param   array
     * @since   1.0.0
     */
    public function delete(array $row):?bool {
        return false;
    }


    /**
     * create table
     * 
     * @since   1.0.0
     */
    public function create_table():?int
    {
        $data   = array(
            'column_types'  => $this->column_types,
            'keys'  => $this->keys ?? array(),
            'unique_keys'   => $this->unique_keys ?? array(),
            'primary_key'   => $this->primary_key ?? null,
            'tablename' => $this->tablename,
        );

        $result = $this->db->table($this->tablename)->create_table($data);
        return $result;
    }


    /**
     * read row
     * 
     * @param   integer
     * @param   integer
     * @since   1.0.0
     */
    public function read(?int $id = null, ?int $page = null):?array
    {
        return $this->db->table($this->tablename)->read();
    }


    /**
     * read row by query
     * 
     * @param   array
     * @param   integer
     * @since   1.0.0
     */
    public function read_by(array $query, ?int $page = null): ?array {
        return null;
    }


    /**
     * updaterow
     * 
     * @param   array
     * @since   1.0.0
     */
    public function update(array $row):?int {
        return null;
    }
}
