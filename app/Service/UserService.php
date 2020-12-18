<?php

namespace App\Service;

class UserService
{
    public function login($request, $value)
    {
        return $request->user()->createToken($value);
    }
}
