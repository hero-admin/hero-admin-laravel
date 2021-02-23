<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Framework\Modules\Core\Services\UserService;
use Framework\Modules\Core\Services\VerificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class VerificationController
 * @package App\Http\Controllers\Auth
 *
 * @group   Auth
 */
class VerificationController extends Controller
{
	/**
	 * Verify an account
	 *
	 *
	 * @param UserRequest         $request
	 * @param UserService         $userService
	 * @param VerificationService $verificationService
	 *
	 * @return object
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
	 * Revoke a login user token
	 *
	 * @param Request     $request
	 * @param UserService $userService
	 *
	 * @authenticated
	 *
	 * @return JsonResponse
	 */
	public function revocation(Request $request, UserService $userService): JsonResponse
	{
		$email = $request->user()->email;

		return $userService->logout($email)
			? response()->json('Token is revocation')
			: response()->json('Server error', 500);
	}
}
