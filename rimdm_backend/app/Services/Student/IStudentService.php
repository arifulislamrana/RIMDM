<?php

namespace App\Services\Student;

use App\DataObjects\User;

interface IStudentService
{
    public function saveStudentData(User $studentData);
    public function isStudentRollTaken(User $studentData);
}
