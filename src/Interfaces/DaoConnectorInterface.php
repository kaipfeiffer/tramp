<?php

namespace Kaipfeiffer\Tramp\Interfaces;

interface DaoConnectorInterface{

    public function read(?int $id = null, ?int $page = null): ?array;

    public function read_by(array $query, ?int $page = null): ?array;

    public function create(array $row): ?int;

    public function create_table(array $row): ?int;

    public function update(array $row): ?int;

    public function delete(array $row): bool;

    public function table(string $table): self;
}