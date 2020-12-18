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
    use UserService, VerificationService;

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     *
     * @return Collection|Response|bool|null
     */
    public function store(UserRequest $request): Collection|Response|bool|null
    {
        $email    = $request->post('email');
        $password = $request->post('password');

        return $this->verify($email, $password)
            ? $this->login($request, $email)
            : null;
    }
}
