<?php

namespace App\User;


interface UserPermissionInterface
{

    public function getPermissions(): array;
}