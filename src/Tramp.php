<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\Interfaces\DAOConnectorInterface;
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
     * @param   DAOConnectorInterface
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

        if ($dao instanceof DAOConnectorInterface) {
            $db   = $dao;
        } else {
            $db   = new MockedDAO('test');
        }

        foreach($models as $class){
            $model  = new $class($db);
            $result += $model->create_table();
        }
        error_log(__CLASS__.'->'.__LINE__.'->'.$result);

        return $result;
    }
}
