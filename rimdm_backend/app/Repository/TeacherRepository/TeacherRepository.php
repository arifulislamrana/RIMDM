<?php
namespace App\Repository\TeacherRepository;

use App\Models\Teacher;
use App\Repository\BaseRepository\BaseRepository;

class TeacherRepository extends BaseRepository implements ITeacherRepository
{
    public function __construct(Teacher $model)
    {
        parent::__construct($model);
    }

    public function getTeacherByEmail($email)
    {
        return $this->model->where(['email' => $email])->first();
    }

    public function getAdminTeachers()
    {
        $adminTeachers = $this->model->join('roles', 'teachers.role_id', '=', 'roles.id')->where('roles.name', 'admin')->get(['teachers.id', 'teachers.name','teachers.email','teachers.img','roles.name as role']);

        return $adminTeachers;
    }
}

?>
