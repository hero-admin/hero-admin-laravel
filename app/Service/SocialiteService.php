<?php

namespace App\Service;

use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialiteService
{

	private Provider $socialite;

	public function driver(string $driver): static
	{
		$this->socialite = Socialite::driver($driver);
		return $this;
	}

	public function redirect(): RedirectResponse
	{
		return $this->socialite->redirect();
	}

	public function user(): User
	{
		return $this->socialite->user();
	}
}