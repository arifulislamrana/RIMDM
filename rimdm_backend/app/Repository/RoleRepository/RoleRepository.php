<?php 
namespace App\Repository\RoleRepository;

use App\Models\Role;
use App\Repository\BaseRepository\BaseRepository;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getAdmins()
    {
        $adminTeachers = $this->model->join('teachers', 'teachers.role_id', '=', 'roles.id')->where('roles.name', 'admin')->get(['teachers.id', 'teachers.name','teachers.email','teachers.img','roles.name as role']);

        return $adminTeachers;
    }

    public function getSuperAdmins()
    {
        $adminTeachers = $this->model->join('teachers', 'teachers.role_id', '=', 'roles.id')->where('roles.name', 'super admin')->get(['teachers.id', 'teachers.name','teachers.email','teachers.img','roles.name as role']);

        return $adminTeachers;
    }
};