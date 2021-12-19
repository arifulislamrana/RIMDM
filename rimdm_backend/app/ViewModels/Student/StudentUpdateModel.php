<?php

namespace App\ViewModels\Student;

use App\DataObjects\User;
use App\Http\Requests\CreateStudent;
use App\Http\Requests\UpdateStudent;
use App\Services\ClassLevel\IClassService;
use App\Services\Student\IStudentService;

class StudentUpdateModel
{
    public $student;
    public $classes;
    public $studentService;
    public $classService;

    public function __construct(IStudentService $studentService, IClassService $classService)
    {
        $this->studentService = $studentService;
        $this->classService = $classService;
    }

    public function load($id)
    {
        $this->getClasses();
        $this->getStudentById($id);
    }
    public function updateStudentData(UpdateStudent $request, $id)
    {
        $studentData =  $request->getObject();
        $studentData->image = $request->file('image');

        return $this->studentService->updateStudent($studentData, $id);
    }

    public function getClasses()
    {
        $this->classes = $this->classService->getAllClasses();
    }

    public function getStudentById($id)
    {
        $this->student = $this->studentService->getStudentById($id);
    }
}
