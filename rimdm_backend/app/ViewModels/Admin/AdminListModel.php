<?php
namespace App\ViewModels\Admin;

use App\Services\Role\IRoleService;

class AdminListModel
{
    private $roleService;
    public $allAdmins;
    public $admins;
    public $superAdmins;

    public function __construct(IRoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function load()
    {
        $this->getAdmins();
        $this->getSuperAdmins();
        $this->allAdmins = $this->admins->merge($this->superAdmins);
    }

    public function concatAdminsAndSuperAdmins()
    {
       # 
    }

    public function getAdmins()
    {
        $this->admins = $this->roleService->getAdmins();
    }

    public function getSuperAdmins()
    {
        $this->superAdmins = $this->roleService->getSuperAdmins();
    }
}