<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
use App\Service\VerificationService;
use Illuminate\Http\JsonResponse;

class VerificationController extends Controller
{
	use UserService, VerificationService;

	/**
	 * Verify an account
	 *
	 * @param UserRequest $request
	 *
	 * @return object
	 * @property string   $email
	 */
	public function store(UserRequest $request): object
	{
		$email    = $request->post("email");
		$password = $request->post("password");

		return $this->verify($email, $password)
			? $this->login($email)
			: response()->json('Resource not found', 404);
	}

	public function revocation(UserRequest $request): JsonResponse
	{
		$email = $request->user()->email;

		return $this->logout($email)
			? response()->json('Token is revocation')
			: response()->json('Server error', 500);
	}
}
