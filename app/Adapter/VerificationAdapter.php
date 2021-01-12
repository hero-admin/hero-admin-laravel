<?php

namespace App\Adapter;

use App\Service\SocialiteService;
use App\Service\VerificationService;
use Exception;
use Laravel\Socialite\Contracts\User;

class VerificationAdapter
{
	/**
	 * @var string
	 */
	private string $driver;

	/**
	 * @var SocialiteService
	 */
	private SocialiteService $socialiteService;

	/**
	 * @var VerificationService
	 */
	private VerificationService $verificationService;

	/**
	 * @var string|null
	 */
	private string|null $email;

	/**
	 * @var string|null
	 */
	private string|null $password;

	/**
	 * VerificationAdapter constructor.
	 *
	 * @param VerificationService $verificationService
	 * @param SocialiteService    $socialiteService
	 */
	public function __construct(VerificationService $verificationService, SocialiteService $socialiteService)
	{
		$this->verificationService = $verificationService;
		$this->socialiteService    = $socialiteService;
	}

	/**
	 * @param string $driver
	 *
	 * @return $this
	 */
	public function driver(string $driver): static
	{
		$this->driver = $driver;
		return $this;
	}

	/**
	 * @param string|null $email
	 * @param string|null $password
	 *
	 * @return int|User
	 */
	public function verify(string $email = null, string $password = null): int|User
	{
		$this->email    = $email;
		$this->password = $password;

		return $this->driver === 'common'
			? $this->common()
			: $this->socialite();
	}

	/**
	 * @return int
	 */
	protected function common(): int
	{
		return $this->verificationService->verify($this->email, $this->password);
	}

	/**
	 * @return User
	 */
	protected function socialite(): User
	{
		try {
			return $this->socialiteService->driver($this->driver)
			                              ->user();
		} catch (Exception) {
			$this->socialiteService->driver($this->driver)
			                       ->redirect();

			return $this->socialite();
		}
	}
}