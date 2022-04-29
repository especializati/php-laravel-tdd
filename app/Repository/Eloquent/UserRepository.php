<?php

namespace App\Repository\Eloquent;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findAll(): array
    {
        return $this->model->get()->toArray();
    }
}
