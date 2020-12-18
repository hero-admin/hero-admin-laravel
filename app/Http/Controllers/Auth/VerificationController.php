<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
use App\Service\VerificationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class VerificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest         $request
     * @param VerificationService $verificationService
     * @param UserService         $userService
     *
     * @return Collection|Response|bool|null
     */
    public function store(UserRequest $request,
                          VerificationService $verificationService,
                          UserService $userService): Collection|Response|bool|null
    {
        $email    = $request->post('email');
        $password = $request->post('password');

        return $verificationService->verify($email, $password)
            ? $userService->login($request, $email)
            : null;
    }
}
