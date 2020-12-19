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
	 * Store a newly created resource in storage.
	 *
	 * @OA\Post(
	 * path="/verification",
	 * description="Auth Account",
	 * @OA\Parameter(
	 *  name="Email",
	 *  required=true,
	 *  in="path",
	 *  @OA\Schema(
	 *    type="string"
	 *  )
	 * ),
	 * @OA\Parameter(
	 *  name="Password",
	 *  required=true,
	 *  in="path",
	 *  @OA\Schema(
	 *    type="string"
	 *  )
	 * ),
	 * @OA\Response(response="200", description="Plant Text Token")
	 * )
	 *
	 * @param UserRequest $request
	 *
	 * @return string|null
	 *@property string $email
	 *
	 */
	public function store(UserRequest $request): ?string
	{
		$email    = $request->post("email");
		$password = $request->post("password");

		return $this->verify($email, $password)
			? $this->login($request, $email)
			: null;
	}
}
