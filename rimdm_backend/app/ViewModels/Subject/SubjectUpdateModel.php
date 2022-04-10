<?php
namespace App\ViewModels\Subject;

use App\Http\Requests\CreateSubject;
use App\Services\ClassLevel\IClassService;
use App\Services\Subject\ISubjectService;
use App\Services\Teacher\ITeacherService;
use Illuminate\Http\Request;

class SubjectUpdateModel
{
    private $subjectService;
    public $subjectsOfSpecificClass;
    public $classes;
    public $classService;
    public $teacherService;
    public $teachers;
    public $currentSubject;

    public function __construct(ISubjectService $subjectService, IClassService $classService, ITeacherService $teacherService)
    {
        $this->subjectService = $subjectService;
        $this->classService = $classService;
        $this->teacherService = $teacherService;
    }

    public function load($id)
    {
        $this->teachers = $this->getAllTeachers();
        $this->classes = $this->getAllClasses();
        $this->currentSubject = $this->currentSubject($id);
    }

    public function getAllTeachers()
    {
        return $this->teacherService->getAllTeacher();
    }

    public function getAllClasses()
    {
        return $this->classService->getAllClasses();
    }

    public function updateData(CreateSubject $request, $id)
    {
        $subjectData = $request->getObject();

        $this->subjectService->UpdateSubject($subjectData, $id);

        return $this->subjectService->getSubjectById($id);
    }

    public function currentSubject($id)
    {
        return $this->subjectService->getSubjectById($id);
    }
}
