<?php

namespace App\User\Employee;


use App\User\UserPermissionInterface;

interface EmployeeInterface extends UserPermissionInterface
{
    public function getChangeStatus(): array; // список статусов которые может менять
}