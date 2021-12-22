<?php

namespace App\Repository\ClassRepository;

use App\Models\ClassLevel;
use phpDocumentor\Reflection\Types\Parent_;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\ClassRepository\IClassRepository;

class ClassRepository extends BaseRepository implements IClassRepository
{
    public function __construct(ClassLevel $model)
    {
        parent::__construct($model);
    }
}
