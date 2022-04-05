<?php
namespace App\ViewModels\Admin;

use App\Services\Teacher\ITeacherService;

class AddAdminModel
{
    private $teacherService;
    public $teachers;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function load()
    {
        $this->teachers = $this->getTeachers();
    }

    public function getTeachers()
    {
        $teachers = [];
        $temp = $this->teacherService->getAllTeacher();

        foreach ($temp as $teacher)
        {
            if ($teacher->role->name == 'teacher')
            {
                array_push($teachers, $teacher);
            }
        }

        return $teachers;
    }

    public function UpgradeToAdmin($id)
    {
        return $this->teacherService->changeRoleToAdmin($id);
    }
}
