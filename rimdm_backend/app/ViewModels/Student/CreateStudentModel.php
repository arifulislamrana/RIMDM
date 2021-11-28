<?php

namespace App\ViewModels\Students;

use App\Services\Student\IStudentService;

class StudentClassesModel
{
    public $studentService;

    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

}
