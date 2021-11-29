<?php
namespace App\ViewModels\Student;

use App\Services\ClassLevel\IClassService;

class StudentsClassesModel
{
    private $classService;
    public $classes;

    public function __construct(IClassService $classService)
    {
        $this->classService = $classService;
    }

    public function load()
    {
        $this->existingClasses();
    }

    public function existingClasses()
    {
        $this->classes = $this->classService->getAllClasses();
    }
}
