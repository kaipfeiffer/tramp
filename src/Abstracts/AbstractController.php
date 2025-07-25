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

abstract class AbstractController
{

    /**
     * dao connector
     *
     * @var     DaoConnectorInterface
     * @since   1.0.1
     */
    static $dao;


    /**
     * model
     *
     * @since   1.0.1
     */
    static $model;

    /**
     * PROTECTED METHODS
     */


    /**
     * get_model
     * 
     * @return  DaoModelInterface
     * @since   1.0.1 
     */
    abstract protected static function get_model(): DaoModelInterface;



    /**
     * PUBLIC METHODS
     */


    /**
     * get_editable_columns 
     * 
     * @return  array
     * @since   1.0.0
     */
    public static function get_editable_columns(): array
    {
        $model = static::get_model();

        return $model->get_editable_columns();
    }


    /**
     * get_primary_key 
     * 
     * @return  string
     * @since   1.0.0
     */
    public function get_primary_key(): string
    {
        $model = static::get_model();

        return $model->get_primary_key();
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
        $model = static::get_model();

        return $model->get_row_cnt();
    }


    /**
     * search
     * 
     * @param   string
     * @param   int
     * @param   int
     * @since   1.0.0
     */
    public static function search(string $s, ?int $page = null, ?int $per_page = null): ?array
    {
        $model = static::get_model();
        $columns    = $model->get_editable_columns();
        $columns[$model->get_primary_key()] = null;

        $query = array(
            'column' => 'familyname',
            'comparator' => '%like%',
            'value' => $s
        );
        error_log(__CLASS__.'->'.__LINE__.'->'.print_r($query,1));
        $data       = $model->read_by($query, $page, $per_page);

        return static::hide_columns($data, $columns);
    }


    /**
     * read row
     * 
     * @param   int
     * @param   int
     * @param   int
     * @since   1.0.0
     */
    public static function read(?int $id = null, ?int $page = null, ?int $per_page = null): ?array
    {
        $model = static::get_model();
        $columns    = $model->get_editable_columns();
        $columns[$model->get_primary_key()] = null;

        $data       = $model->read($id, $page, $per_page);

        return static::hide_columns($data, $columns);
    }


    /**
     * hide_columns
     * @param   array $data
     * @param   array $columns
     * @return  array|null
     * @since   1.0.1
     */
    protected static function hide_columns(array $data, array $columns):?array
    {
        if (array_is_list($data)) {
            foreach ($data as $index => $details) {
                if (is_array($details) && is_array($columns)) {
                    $data[$index]   = array_intersect_key($details, $columns);
                } else {
                    $data[$index]   = null;
                }
            }
            return $data;
        } else {
            if (!(is_array($data) && is_array($columns))) {
                return null;
            }
            return array_intersect_key($data, $columns);
        }
    }


    /**
     * set_dao
     * 
     * @param   DaoConnectorInterface
     * @since   1.0.1 
     */
    public static function set_dao(DaoConnectorInterface $dao)
    {
        static::$dao    = $dao;
    }


    /**
     * create
     * 
     * @param   array
     * @throws  Exception
     * @since   1.0.1 
     */
    public static function create(array $data)
    {
        $model = static::get_model();

        return $model->create($data);
    }


    /**
     * check
     * 
     * checks if the submitted date is valid
     * the messages should be stored in the value of the associated column
     * 
     * @param   array
     * @return  array
     * @since   1.0.1
     */
    public static function check(array $data): array
    {
        $model = static::get_model();
        $columns    = $model->get_editable_columns();
        return array_diff_key($columns, $data);
    }


    /**
     * update
     * 
     * @param   array   $data
     * @return  boolean true on success, false on failure
     * @since    1.0.0
     */
    public static function update(array $data): int
    {
        $model = static::get_model();
        return $model->update($data);
    }
}
