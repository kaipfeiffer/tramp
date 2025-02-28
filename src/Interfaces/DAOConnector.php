<?php

namespace Kaipfeiffer\Tramp\Interfaces;

interface DAOConnector{

    public function read(int|null $id = null, int|null $page = null);

    public function read_by(array $query, int|null $page = null);

    public function create(array $row);

    public function create_table(array $row);

    public function update(array $row);

    public function delete(array $row);

    public function table(string $table):DAOConnector;
}