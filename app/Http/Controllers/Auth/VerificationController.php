<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
use App\Service\VerificationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
