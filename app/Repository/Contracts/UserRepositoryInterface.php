<?php

namespace App\Repository\Contracts;

interface UserRepositoryInterface
{
    public function findAll(): array;
    public function create(array $data): object;
}

