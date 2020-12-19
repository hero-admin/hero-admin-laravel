<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

trait VerificationService
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
		$res          = $this->getByEmail($email);
		$hashPassword = $res->password;

		return Hash::check($password, $hashPassword);
	}

	/**
	 * @param $value
	 *
	 * @return Builder|Model
	 */
	public function getByEmail($value): Builder|Model
	{
		return $this->email($value)
		            ->firstOrFail();
	}
}
