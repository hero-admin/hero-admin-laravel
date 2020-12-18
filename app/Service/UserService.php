<?php

namespace App\Service;

trait UserService
{
    public function login($request, $value)
    {
        return $request->user()
                       ->createToken($value);
    }
}
