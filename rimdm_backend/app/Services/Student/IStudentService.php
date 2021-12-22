<?php

namespace App\Services\Student;

use App\DataObjects\User;

interface IStudentService
{
    public function saveStudentData(User $studentData);

    public function isStudentRollTaken(User $studentData);

    public function getStudentsOfSpecificClass($classId);

    public function removeStudent($id);

    public function getStudentById($id);

    public function updateStudent(User $student, $id);
}
