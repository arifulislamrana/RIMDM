<?php
namespace App\Services\Teacher;

use App\DataObjects\Teacher;

interface ITeacherService
{
    public function getTeacherByEmail($email);

    public function getAllTeacher();

    public function removeTeacher($id);

    public function saveTeacherData(Teacher $teacher);
}
?>
