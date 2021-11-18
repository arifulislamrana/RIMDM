<?php
namespace App\Repository\TeacherRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ITeacherRepository extends IBaseRepository
{
    public function getTeacherByEmail($email);
}
?>
