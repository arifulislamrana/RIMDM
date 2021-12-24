<?php
namespace App\Services\Role;

use App\Repository\RoleRepository\IRoleRepository;
use App\Repository\TeacherRepository\ITeacherRepository;

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
}