<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class VerificationService
{

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verify(string $email, string|int $password): bool
    {
        $res          = $this->getByEmail($email);
        $hashPassword = $res->password;

        return Hash::check($password, $hashPassword);
    }

    public function getByEmail($value): Collection|array|UserService
    {
        return $this->userRepository->email($value)->firstOrFail();
    }
}
