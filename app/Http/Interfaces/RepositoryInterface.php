<?php

namespace App\Http\Interfaces;


interface RepositoryInterface
{

    public function getAll();

    public function getOne(int $id);

    public function where(array $pred);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

}
