<?php
namespace App\Services\Teacher;

use App\DataObjects\Teacher;
use App\DataObjects\User;

interface ITeacherService
{
    public function getTeacherByEmail($email);

    public function getAllTeacher();

    public function removeTeacher($id);

    public function saveTeacherData(Teacher $teacher);

    public function getTeacherById($id);

    public function updateTeacher($id, Teacher $teacher);
}
?>
