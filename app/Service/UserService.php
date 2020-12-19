<?php

namespace App\Service;

use App\Repository\UserRepository;

trait UserService
{
	use UserRepository;

	/**
	 * @param $value
	 *
	 * @return object
	 */
	public function login($value): object
	{
		$user = $this->email($value)
		             ->first();
		return $user->createToken($value);
	}
}
