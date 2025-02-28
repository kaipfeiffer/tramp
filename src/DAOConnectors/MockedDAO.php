<?php

namespace Kaipfeiffer\Tramp\DAOConnectors;

use Kaipfeiffer\Tramp\Interfaces\DAOConnector;

class MockedDAO implements DAOConnector
{

    protected $table;


    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function read(int $id = null, int $page = null)
    {
        return $this->table;
    }

    public function read_by(array $query, int $page = null) {}

    public function create(array $row) {}

    public function create_table(array $data)
    {
        return print_r($data, 1);
    }

    public function update(array $row) {}

    public function delete(array $row) {}

    public function table(string $table): DAOConnector
    {
        $this->table = $table;
        return $this;
    }
}
