<?php
namespace App\ViewModels\Teacher;

use App\Http\Requests\UpdateTeacher;
use App\Services\Teacher\ITeacherService;

class UpdateTeacherModel
{
    private $teacherService;
    public $teacher;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function load($id)
    {
        $this->teacher = $this->getTeacherById($id);
    }

    public function getTeacherById($id)
    {
        return $this->teacherService->getTeacherById($id);
    }

    public function updateTeacher(UpdateTeacher $request, $id)
    {
        $teacher = $request->getObject();

        return $this->teacherService->updateTeacher($id, $teacher);
    }
}
