<?php

namespace App\Service;

trait UserService
{
	/**
	 * @param $request
	 * @param $value
	 *
	 * @return string
	 */
	public function login($request, $value): string
	{
		return $request->user()
		               ->createToken($value)->plainTextToken;
	}
}
