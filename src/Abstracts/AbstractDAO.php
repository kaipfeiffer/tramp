<?php

namespace Kaipfeiffer\Tramp\Abstracts;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;

/**
 * Abstract Static Class for Database-Access via wpdb
 *
 * @author  Kai Pfeiffer <kp@loworx.com>
 * @package ridepool
 * @since   1.0.0 
 */

abstract class AbstractDAO

{
    protected $db;

    protected $tablename;

    public function __construct(DAOConnector $db)
    {
        $this->db   = $db;
    }

    public function read(int|null $id = null, int|null $page = null)
    {
        return $this->db->table($this->tablename)->read();
    }

    public function read_by(array $query, int|null $page = null) {}

    public function create(array $row) {}

    public function create_table(array $row) {}

    public function update(array $row) {}

    public function delete(array $row) {}
}
