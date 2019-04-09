<?php

namespace App\User;


class User
{
    private $user;

    public function __construct(Customer $user)
    {
        $this->user = $user;
    }
}