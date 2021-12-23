<?php
namespace App\ViewModels\Student;

use App\Services\ClassLevel\IClassService;
use App\Services\Result\IResultService;
use App\Services\Student\IStudentService;

class StudentProfileModel
{
    private $studentService;
    private $classService;
    private $resultService;
    public $student;
    public $classSubjectTeacherList;
    public $studentResults;

    public function __construct(IStudentService $studentService, IClassService $classService, IResultService $resultService)
    {
        $this->studentService = $studentService;
        $this->classService = $classService;
        $this->resultService = $resultService;
    }

    public function load($id)
    {
        $this->getStudentById($id);
        $this->getResultsOfStudent($id);
        $this->getclassSubjectTeacherList($this->student->class_level_id);
    }

    public function getStudentById($id)
    {
        $this->student = $this->studentService->getStudentById($id);
    }

    public function getclassSubjectTeacherList($classId)
    {
        $this->classSubjectTeacherList = $this->classService->classSubjectTeachersList($classId);
    }

    public function getResultsOfStudent($id)
    {
        $this->studentResults = $this->resultService->getResultByStudentId($id);
    }
}
