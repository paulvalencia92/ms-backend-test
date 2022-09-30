<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return response()->json($users, 200);
    }


    public function update(UserRequest $request, User $user)
    {

        $user->fill($request->all());
        $this->userRepository->save($user);
        return response()->json($user, 201);
    }
}
