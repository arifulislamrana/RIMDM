<?php
namespace App\Services\Teacher;

interface ITeacherService
{
    public function getTeacherByEmail($email);

    public function getAllTeacher();
}
?>
