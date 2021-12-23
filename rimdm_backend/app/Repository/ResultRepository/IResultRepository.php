<?php
namespace App\Repository\ResultRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IResultRepository extends IBaseRepository
{
    public function getResultsOfStudentById($id);
}
