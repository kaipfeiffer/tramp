<?php

namespace Kaipfeiffer\Tramp\Controllers;

use Kaipfeiffer\Tramp\Interfaces\DaoModelInterface;

use Kaipfeiffer\Tramp\Abstracts\AbstractController;
use Kaipfeiffer\Tramp\Models\Ridings;

class RidingController extends AbstractController
{

    /**
     * PROTECTED METHODS
     */

    /**
     * get model
     * 
     * @return  DaoModelInterface
     * @since   1.0.1 
     */
    protected static function get_model(): DaoModelInterface
    {
        if (!static::$model) {
            if (!static::$dao) {
                throw new \Exception('Inject DAOConnector before creating rows');
            }
            static::$model  = new Ridings(static::$dao);
        }
        return static::$model;
    }


    /**
     * PUBLIC METHODS
     */
}
