<?php

namespace App\Kernel\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function model(): string;

    public function create(array $data): Model;

    public function findById(int $id): ?Model;

    public function update(array $data): bool;
}
