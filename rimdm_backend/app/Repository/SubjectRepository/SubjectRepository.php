<?php
namespace App\Repository\SubjectRepository;

use App\Models\Subject;
use App\Repository\BaseRepository\BaseRepository;

class SubjectRepository extends BaseRepository implements ISubjectRepository
{
    public function __construct(Subject $model)
    {
        parent::__construct($model);
    }

    public function getSubjectsByClassId($classId)
    {
        return $this->model->where(['class_level_id' => $classId])->get();
    }
}
