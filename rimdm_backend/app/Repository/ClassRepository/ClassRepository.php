<?php

namespace App\Repository\ClassRepository;

use App\Models\ClassLevel;
use App\Repository\BaseRepository\BaseRepository;
use phpDocumentor\Reflection\Types\Parent_;

class ClassRepository extends BaseRepository implements IClassRepository
{
    public function __constrruct(ClassLevel $model)
    {
        parent::__construct($model);
    }
}
