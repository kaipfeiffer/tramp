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
     * get_editable_columns 
     * 
     * @return  array
     * @since   1.0.0
     */
    public static function get_editable_columns():array
    {
        $model = static::get_model();

        return $model->get_editable_columns();
    }


    /**
     * PUBLIC METHODS
     */


    /**
     * read row
     * 
     * @param   integer
     * @param   integer
     * @since   1.0.0
     */
    public static function read(?int $id = null, ?int $page = null):?array
    {
        $model = static::get_model();
        
        $data       = $model->read($id, $page);
        $columns    = $model->get_editable_columns();
        return array_intersect_key($data, $columns);
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
