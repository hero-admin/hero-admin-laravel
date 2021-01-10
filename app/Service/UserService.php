<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
	use UserRepository;

	/**
	 * @param $value
	 *
	 * @return object
	 */
	public function login($value): object
	{
		return $this->firstUserByEmail($value)
		            ->createToken($value);
	}

	/**
	 * @param $value
	 *
	 * @return object|null
	 */
	public function firstUserByEmail($value): ?object
	{
		return $this->whereByEmail($value)
		            ->first();
	}

	/**
	 * @param $value
	 *
	 * @return int
	 */
	public function logout($value): int
	{
		return $this->firstUserByEmail($value)
		            ->tokens()
		            ->delete();
	}
}
