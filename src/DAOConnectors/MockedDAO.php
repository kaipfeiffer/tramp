<?php

namespace Kaipfeiffer\Tramp\DAOConnectors;

use Kaipfeiffer\Tramp\Interfaces\DaoConnectorInterface;

class MockedDAO implements DaoConnectorInterface
{

    protected $table;


    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function read(?int $id = null, ?int $page = null):?array
    {
        return null;
    }

    public function read_by(array $query, ?int $page = null):?array {
        return array();
    }

    public function create(array $row):?int{
        return null;
    }

    public function create_table(array $row):?int{
        return print_r($row, 1);
    }

    public function update(array $row):?int{
        return null;
    }

    public function delete(array $row):bool{
        return false;
    }

    public function table(string $table):self{
        $this->table = $table;
        return $this;
    }
}
