<?php
namespace App\ViewModels\Student;

use App\Services\ClassLevel\IClassService;
use App\Services\Student\IStudentService;
use Illuminate\Http\Request;

class StudentsTableModel
{
    private $classService;
    private $studentService;
    public $classes;
    public $students;
    public $studentsCount;
    public $classOfsearchingStudents;

    public function __construct(IClassService $classService, IStudentService $studentService)
    {
        $this->classService = $classService;
        $this->studentService = $studentService;
    }

    public function load(Request $request)
    {
        $this->existingClasses();
        $this->getStudentsOfSpecificClass($request->class);
    }

    public function existingClasses()
    {
        $this->classes = $this->classService->getAllClasses();
    }

    public function getStudentsOfSpecificClass($requestClassId)
    {
        if ($requestClassId == null)
        {
            $requestClassId = $this->classes[0]->id;
        }
        $this->classOfsearchingStudents = $this->classService->getClassById($requestClassId );
        $this->students = $this->studentService->getStudentsOfSpecificClass($requestClassId);
        $this->studentsCount = count($this->students);
    }
}
