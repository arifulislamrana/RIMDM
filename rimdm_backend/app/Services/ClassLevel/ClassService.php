<?php

namespace App\Services\ClassLevel;

use App\Repository\ClassRepository\IClassRepository;

class ClassService
{
    public $classRepository;

    public function __construct(IClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

}
