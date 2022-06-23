<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\PaginationInterface;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\Exceptions\NotFoundException;
use App\Repository\Presenters\PaginationPresenter;
use Exception;

class UserRepository implements UserRepositoryInterface
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

    public function paginate(int $page = 1): PaginationInterface
    {
        return new PaginationPresenter($this->model->paginate());
    }

    public function create(array $data): object
    {
        $data['password'] = bcrypt($data['password']);

        return $this->model->create($data);
    }

    public function update(string $email, array $data): object
    {
        if (isset($data['password']))
            $data['password'] = bcrypt($data['password']);

        $user = $this->find($email);
        $user->update($data);

        $user->refresh();

        return $user;
    }

    public function delete(string $email): bool
    {
        return $this->find($email)->delete();
    }

    public function find(string $email): object
    {
        if (!$user = $this->model->where('email', $email)->first()) {
            throw new NotFoundException('User Not Found');
        }

        return $user;
    }
}
