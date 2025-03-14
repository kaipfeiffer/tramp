<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;
use Kaipfeiffer\Tramp\DAOConnectors\MockedDAO;
use Kaipfeiffer\Tramp\Models\Ridings;
use Kaipfeiffer\Tramp\Models\Tramps;

class Tramp
{
    protected $db;

    public static function hello($dao)
    {
        $models   = array(
            Ridings::class,
            Tramps::class,
        );
        $result = 0;

        if ($dao instanceof DAOConnector) {
            $db   = $dao;
        } else {
            $db   = new MockedDAO('test');
        }

        foreach($models as $class){
            $model  = new ($class)($db);
            $result += $model->create_table();
        }
        return $result;
    }
}
