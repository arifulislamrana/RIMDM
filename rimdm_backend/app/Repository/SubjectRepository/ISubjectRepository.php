<?php
namespace App\Repository\SubjectRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ISubjectRepository extends IBaseRepository
{
    public function getSubjectsByClassId($classId);

    public function closeRealtionWithTeacher($teacher_id);

    public function getSubjectsOfSpecificClassWithTeachers($id);

    public function doesExist($name, $class);
}
