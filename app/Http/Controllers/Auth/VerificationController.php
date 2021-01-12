<?php

namespace App\Http\Controllers\Auth;

use App\Adapter\VerificationAdapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\UserService;
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
	 * @param VerificationAdapter $verificationAdapter
	 *
	 * @return object
	 * @response {
	 * "accessToken": {
	 * "name": "deven.stiedemann@example.net",
	 * "abilities": [
	 * "*"
	 * ],
	 * "tokenable_id": 1,
	 * "tokenable_type": "App\\Models\\User",
	 * "updated_at": "2020-12-19T09:07:14.000000Z",
	 * "created_at": "2020-12-19T09:07:14.000000Z",
	 * "id": 16
	 * },
	 * "plainTextToken": "16|fc4ei17QJKPFdl3AvrdNpkS6me512B104onSF7Yw"
	 * }
	 *
	 * @response 404 {
	 *  "message": "Resource not found"
	 * }
	 */
	public function store(UserRequest $request,
	                      VerificationAdapter $verificationAdapter): object
	{
		$email    = $request->post("email");
		$password = $request->post("password");

		return $verificationAdapter->driver('common')
		                           ->verify($email, $password);

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
