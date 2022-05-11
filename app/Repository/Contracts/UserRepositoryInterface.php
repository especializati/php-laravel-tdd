<?php

namespace App\Repository\Contracts;

interface UserRepositoryInterface
{
    public function findAll(): array;
    public function paginate();
    public function create(array $data): object;
    public function update(string $email, array $data): object;
    public function delete(string $email): bool;
    // public function find(string $email): object|null;
    public function find(string $email): ?object;
}

