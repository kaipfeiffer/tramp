<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;
use Kaipfeiffer\Tramp\DAOConnectors\MockedDAO;
use Kaipfeiffer\Tramp\Models\Ridings;

class Tramp
{
    protected $db;

    public function hello($dao)
    {

        if($dao instanceof DAOConnector){
            $db   = $dao;
        }
        else{
            $db   = new MockedDAO('test');
        }
        $ridings    = new Ridings($db);
        
        $table_data = $ridings->create_table_data();
        return $db->create_table($table_data);
    }
}
