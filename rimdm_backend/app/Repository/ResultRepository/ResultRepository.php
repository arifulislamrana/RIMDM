<?php
namespace App\Repository\ResultRepository;

use App\Models\Result;
use App\Repository\BaseRepository\BaseRepository;

class ResultRepository extends BaseRepository implements IResultRepository
{
    public function __construct(Result $model)
    {
        parent::__construct($model);
    }

    public function getResultsOfStudentById($id)
    {
        return $this->model->where(['user_id' => $id])->orderBy('term', 'desc')->get();
    }
}
