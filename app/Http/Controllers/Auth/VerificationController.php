<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
use App\Service\VerificationService;
use Illuminate\Http\JsonResponse;

class VerificationController extends Controller
{
	/**
	 * Verify an account
	 *
	 * @param UserRequest         $request
	 * @param UserService         $userService
	 * @param VerificationService $verificationService
	 *
	 * @return object
	 * @property string           $email
	 */
	public function store(UserRequest $request,
	                      UserService $userService,
	                      VerificationService $verificationService): object
	{
		$email    = $request->post("email");
		$password = $request->post("password");

		return $verificationService->verify($email, $password)
			? $userService->login($email)
			: response()->json('Resource not found', 404);
	}

	/**
	 * @param UserRequest $request
	 * @param UserService $userService
	 *
	 * @return JsonResponse
	 */
	public function revocation(UserRequest $request, UserService $userService): JsonResponse
	{
		$email = $request->user()->email;

		return $userService->logout($email)
			? response()->json('Token is revocation')
			: response()->json('Server error', 500);
	}
}
