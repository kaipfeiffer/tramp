<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\DAOConnectors\MockedDAO;
use Kaipfeiffer\Tramp\Models\Ridings;

class Tramp
{
    protected $db;

    public function hello()
    {
        $db   = new MockedDAO('test');
        $ridings    = new Ridings($db);
        
        return $db->create_table($ridings->create_table_data());
    }
}
