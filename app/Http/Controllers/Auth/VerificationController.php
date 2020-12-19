<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
use App\Service\VerificationService;

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
}
