<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;
use Kaipfeiffer\Tramp\DAOConnectors\MockedDAO;
use Kaipfeiffer\Tramp\Models\Locations;
use Kaipfeiffer\Tramp\Models\Ridings;
use Kaipfeiffer\Tramp\Models\Users;

class Tramp
{

    /**
     * connector to database
     *
     * @var     DAOConnector
     * @since   1.0.0
     */
    protected $db;

    
    /**
     * setup
     * 
     * @param   DAOConnector
     * @since   1.0.0
     */
    public static function setup($dao)
    {
        $models   = array(
            Locations::class,
            Ridings::class,
            Users::class,
        );
        $result = 0;

        if ($dao instanceof DAOConnector) {
            $db   = $dao;
        } else {
            $db   = new MockedDAO('test');
        }

        foreach($models as $class){
            $model  = new $class($db);
            $result += $model->create_table();
        }
        return $result;
    }
}
