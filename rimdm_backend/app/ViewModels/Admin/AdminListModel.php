<?php
namespace App\ViewModels\Admin;

use App\Services\Role\IRoleService;

class AdminListModel
{
    private $roleService;
    public $admins;

    public function __construct(IRoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function load()
    {
        $this->getAdmins();
    }

    public function getAdmins()
    {
        $this->admins = $this->roleService->getAdmins();
    }
}