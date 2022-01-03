<?php

namespace App\Services\Role;

interface IRoleService
{
    public function getAdmins();
    public function getSuperAdmins();
    public function getAllRole();
}
