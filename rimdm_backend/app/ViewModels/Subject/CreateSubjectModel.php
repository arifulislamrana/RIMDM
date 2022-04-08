<?php
namespace App\ViewModels\Subject;

use App\Services\ClassLevel\IClassService;
use App\Services\Subject\ISubjectService;
use App\Services\Teacher\ITeacherService;
use Illuminate\Http\Request;

class CreateSubjectModel
{
    private $subjectService;
    public $subjectsOfSpecificClass;
    public $classes;
    public $classService;
    public $currentClass;
    public $teacherService;
    public $teachers;

    public function __construct(ISubjectService $subjectService, IClassService $classService, ITeacherService $teacherService)
    {
        $this->subjectService = $subjectService;
        $this->classService = $classService;
        $this->teacherService = $teacherService;
    }

    public function load()
    {
        $this->teachers = $this->getAllTeachers();
        $this->classes = $this->getAllClasses();
    }

    public function getAllTeachers()
    {
        return $this->teacherService->getAllTeacher();
    }

    public function getAllClasses()
    {
        return $this->classService->getAllClasses();
    }
}
