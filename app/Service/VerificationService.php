<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

class VerificationService
{
	use UserRepository;

	/**
	 * @param string     $email
	 * @param string|int $password
	 *
	 * @return bool
	 *
	 */
	public function verify(string $email, string|int $password): bool
	{
		$res          = $this->whereByEmail($email)
		                     ->firstOrFail();
		$hashPassword = $res->password;

		return Hash::check($password, $hashPassword);
	}
}
