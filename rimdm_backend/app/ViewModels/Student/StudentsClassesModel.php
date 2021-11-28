<?php

namespace App\ViewModels\Students;

use App\Services\ClassLevel\IClassService;

class StudentClassesModel
{
    public $classService;

    public function __construct(IClassService $classService)
    {
        $this->classService = $classService;
    }

}
