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

abstract class AbstractResource implements DaoModelInterface

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
     * The table columns
     *
     * @var     array
     * @since   1.0.0
     */
    protected $hidden_columns = array(
        'created'   => null,
        'deleted'   => null,
        'id'        => null,
        'status'    => null,
        'updated'   => null,
    );


    /**
     * The name of the primary column
     *
     * @var     string
     * @since   1.0.0
     */
    protected $primary_key;


    /**
     * the last parameters for a query
     * 
     * @var     array|null
     * @since   1.0.0
     */
    protected $query;


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
    protected function default_values()
    {
        return array();
    }


    /**
     * on_update_values
     * 
     * @return   array
     * @since   1.0.0
     */
    protected function on_update_values()
    {
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
    public function create(array $row): ?int
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
    public function delete(array $row): ?bool
    {
        return false;
    }


    /**
     * create table
     * 
     * @since   1.0.0
     */
    public function create_table(): ?int
    {
        $data   = array(
            'column_types'  => $this->column_types,
            'keys'  => $this->keys ?? array(),
            'unique_keys'   => $this->unique_keys ?? array(),
            'primary_key'   => $this->primary_key ?? null,
            'tablename' => $this->tablename,
        );

        error_log(__CLASS__ . '->' . __LINE__ . '->TABLE:' . $this->tablename);
        $result = $this->db->table($this->tablename)->create_table($data);
        return $result;
    }


    /**
     * get_primary_key 
     * 
     * @return  int
     * @since   1.0.0
     */
    public function get_primary_key(): string
    {
        return $this->primary_key;
    }


    /**
     * get_editable_columns 
     * 
     * @return  array
     * @since   1.0.0
     */
    public function get_editable_columns(): array
    {
        $editable_columns = array_diff_key($this->columns, $this->hidden_columns);

        foreach ($editable_columns as $key => $value) {
            $editable_columns[$key] = '';
        }
        return $editable_columns;
    }


    /**
     * get row count
     * 
     * get the number of rows in the table
     * 
     * @return  int|null
     * @since   1.0.0
     */
    public function get_row_cnt(): ?int
    {  
        return $this->db->table($this->tablename)->get_row_cnt($this->query);
    }


    /**
     * read row
     * 
     * @param   int
     * @param   int
     * @param   int
     * @since   1.0.0
     */
    public function read(?int $id = null, ?int $page = null, ?int $per_page = null): ?array
    {
        return $this->db->table($this->tablename)->read($id, $page, $per_page);
    }


    /**
     * read row by query
     * 
     * @param   array
     * @param   int
     * @param   int
     * @since   1.0.0
     */
    public function read_by(array $query, ?int $page = null, ?int $per_page = null): ?array
    {
        $this->query    = $query;
        return $this->db->table($this->tablename)->read_by($query, $page, $per_page);
    }


    /**
     * save row
     * 
     * @param   array
     * @return  int
     * @since   1.0.0
     */
    public function save(array $row): ?int
    {
        if ($row[$this->primary_key] ?? null) {
            return $this->update($row);
        } else {
            return $this->create($row);
        }
    }


    /**
     * updaterow
     * 
     * @param   array
     * @since   1.0.0
     */
    public function update(array $row): ?int
    {
        $sanitized  = $this->default_values();

        foreach ($row as $key => $value) {
            if (isset($this->columns[$key])) {
                $sanitized[$key]    = sprintf($this->columns[$key], $value);
            }
        }
        $result = $this->db->table($this->tablename)->update($sanitized);
        return $result;
    }
}
