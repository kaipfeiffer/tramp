<?php

namespace Kaipfeiffer\Tramp;

use Kaipfeiffer\Tramp\DAOConnectors\MockedDAO;
use Kaipfeiffer\Tramp\Models\Ridings;

class Tramp
{
    protected $db;

    public function hello()
    {
        $this->db   = new MockedDAO('test');
        $ridings    = new Ridings($this->db);
        return $ridings->read();
    }
}
