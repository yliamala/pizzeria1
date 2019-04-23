<?php

namespace App\User;

class ACL
{
    public static function checkPermission(PermissionInterface $perm, UserPermissionInterface $customer): bool
    {
        return (in_array($perm, $customer->getPermissions()));
    }

}