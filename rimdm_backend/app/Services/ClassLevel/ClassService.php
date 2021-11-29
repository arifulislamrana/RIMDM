<?php

namespace App\Services\ClassLevel;

use Exception;
use App\Repository\ClassRepository\IClassRepository;

class ClassService implements IClassService
{
    public $classRepository;

    public function __construct(IClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAllClasses()
    {
        $classes = $this->classRepository->getAll();

        if (empty($classes))
        {
            throw new Exception("No Classes exist");
        }

        return $classes;
    }

}
