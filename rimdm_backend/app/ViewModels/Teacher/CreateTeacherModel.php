<?php
namespace App\ViewModels\Teacher;

use App\Services\Role\IRoleService;

class CreateTeacherModel
{
    private $roleService;
    public $roles;

    public function __construct(IRoleService $roleService)
    {
        $this->roleService = $roleService;
    }
}
