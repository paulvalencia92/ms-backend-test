<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all()
    {
        return $this->model->get();
    }


    public function save(User $user)
    {
        $user->save();
        return $user;
    }

}
