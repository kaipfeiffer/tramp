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
     * create
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
}
