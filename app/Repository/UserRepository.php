<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    private Builder $user;

    public function __construct()
    {
        $this->user = User::query();
    }

    public function email(string $value): UserRepository
    {
        $this->user = $this->user->where('email', $value);
        return $this;
    }

    public function password(string|int $value): UserRepository
    {
        $this->user = $this->user->where('password', $value);
        return $this;
    }

    public function get(): Collection|array
    {
        return $this->user->get();
    }

    public function firstOrFail(): Builder|Model
    {
        return $this->user->firstOrFail();
    }

    public function first(): object|null
    {
        return $this->user->first();
    }
}
