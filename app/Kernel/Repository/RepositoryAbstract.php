<?php

namespace App\Kernel\Repository;

use App\Kernel\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class RepositoryAbstract implements RepositoryInterface
{
    abstract public function model(): string;

    public function create(array $data): Model
    {
        return $this->model()::create($data);
    }

    public function update(array $data): bool
    {
        return $this->model()::update($data);
    }

    public function findById(int $id, string $e = ModelNotFoundException::class): ?Model
    {
        return $this->model()::find($id) ?? throw new $e();
    }
}
