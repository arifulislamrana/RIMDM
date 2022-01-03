<?php
namespace App\ViewModels\Teacher;

use App\Services\Teacher\ITeacherService;
use Illuminate\Http\Request;

class TeacherListModel
{
    private $teacherService;
    public $teachers;
    public $teachersCount;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function load()
    {
        $this->getAllTeacher();
    }

    public function getAllTeacher()
    {
        $this->teachers = $this->teacherService->getAllTeacher();
        $this->teachersCount = count($this->teachers);
    }

    public function destroyTeacherData($id)
    {
        return $this->teacherService->removeTeacher($id);
    }
}
