<?php

namespace App\Services\Role;

use App\Repository\RoleRepository\IRoleRepository;
use App\Services\Role\IRoleService;

class RoleService implements IRoleService
{
    private $roleRepository;

    public function __construct(IRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRole()
    {
        $roles = $this->roleRepository->getAll();

        return $roles;
    }
}
