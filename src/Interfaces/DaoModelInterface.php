<?php

namespace Kaipfeiffer\Tramp\Interfaces;

interface DaoModelInterface{

    public function read(?int $id, ?int $page = null):?array;

    public function read_by(array $query, ?int $page = null):?array;

    public function create(array $row):?int;

    public function create_table():?int;

    public function get_primary_key():string;

    public function get_editable_columns():array;

    public function get_row_cnt():?int;

    public function update(array $row):?int;

    public function delete(array $row):?bool;
}