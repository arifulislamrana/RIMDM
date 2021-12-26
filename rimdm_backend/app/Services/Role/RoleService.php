<?php
namespace App\Services\Role;

use App\Repository\RoleRepository\IRoleRepository;

class RoleService implements IRoleService
{
    private $roleRepository;

    public function __construct(IRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAdmins()
    {
        $admins =  $this->roleRepository->getAdmins();

        if (empty($admins)) 
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'No Admin Exists.']);
        }

        return $admins;
    }

    public function getSuperAdmins()
    {
        $superAdmin = $this->roleRepository->getSuperAdmins();

        if (empty($superAdmin))
        {
            return redirect()->back()
            ->withErrors(['invalid' => 'No Super Admin Exists.']);
        }

        return $superAdmin;
    }
}