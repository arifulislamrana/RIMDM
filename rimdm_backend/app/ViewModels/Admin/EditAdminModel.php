<?php
namespace App\ViewModels\Admin;

use App\Services\Role\IRoleService;
use App\Services\Teacher\ITeacherService;

class EditAdminModel
{
    private $roleService;
    private $teacherService;
    public $roles;
    public $teacher;

    public function __construct(IRoleService $roleService, ITeacherService $teacherService)
    {
        $this->roleService = $roleService;
        $this->teacherService = $teacherService;
    }

    public function load($id)
    {
        $this->roles = $this->getAllRoles();
        $this->teacher = $this->getTeacherRole($id);
    }

    public function getAllRoles()
    {
        return $this->roleService->getAllRole();
    }

    public function getTeacherRole($id)
    {
        $teacher = $this->teacherService->getTeacherById($id);

        return $teacher;
    }

    public function editAdminship($id, $roleId)
    {
        return $this->teacherService->editAdminship($id, $roleId);
    }

}
