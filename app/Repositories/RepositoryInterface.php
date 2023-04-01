<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function get();

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}