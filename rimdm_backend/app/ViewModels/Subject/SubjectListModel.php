<?php
namespace App\ViewModels\Subject;

use App\Services\ClassLevel\IClassService;
use App\Services\Student\IStudentService;
use App\Services\Subject\ISubjectService;
use Illuminate\Http\Request;

class SubjectListModel
{
    private $subjectService;
    public $subjectsOfSpecificClass;
    public $classes;
    public $classService;
    public $currentClass;

    public function __construct(ISubjectService $subjectService, IClassService $classService)
    {
        $this->subjectService = $subjectService;
        $this->classService = $classService;
    }

    public function load(Request $request)
    {
        $this->existingClasses();
        $this->getSubjectsOfSpecificClassWithTeachers($request->classId);
    }

    public function existingClasses()
    {
        $this->classes = $this->classService->getAllClasses();
    }

    public function getSubjectsOfSpecificClassWithTeachers($requestClassId)
    {
        if ($requestClassId == null)
        {
            $requestClassId = $this->classes[0]->id;
        }
        $this->currentClass = $this->classService->getClassById($requestClassId);
        $this->subjectsOfSpecificClass = $this->subjectService->getSubjectsOfSpecificClass($requestClassId);
    }
}
