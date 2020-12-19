<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait UserRepository
{
	private Builder $user;

	/**
	 * UserRepository constructor.
	 */
	public function __construct()
	{
		$this->user = User::query();
	}

	/**
	 * @param string $value
	 *
	 * @return $this
	 */
	public function email(string $value): UserRepository
	{
		$this->user = $this->user->where('email', $value);
		return $this;
	}

	/**
	 * @param string|int $value
	 *
	 * @return $this
	 */
	public function password(string|int $value): UserRepository
	{
		$this->user = $this->user->where('password', $value);
		return $this;
	}

	/**
	 * @return Collection|array
	 */
	public function get(): Collection|array
	{
		return $this->user->get();
	}

	/**
	 * @return Builder|Model
	 */
	public function firstOrFail(): Builder|Model
	{
		return $this->user->firstOrFail();
	}

	/**
	 * @return object|null
	 */
	public function first(): object|null
	{
		return $this->user->first();
	}
}
