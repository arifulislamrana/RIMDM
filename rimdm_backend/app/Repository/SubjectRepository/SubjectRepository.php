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

    public function closeRealtionWithTeacher($teacher_id)
    {
        return $this->model->where(['teacher_id' => $teacher_id])->update(['teacher_id' => null]);
    }

    public function getSubjectsOfSpecificClassWithTeachers($id)
    {
        $subjectsWithTeachers = $this->model->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')->where(['subjects.class_level_id' => $id])->get(['subjects.id', 'subjects.name','teachers.name as teacherName','teachers.img','subjects.class_level_id']);

        return $subjectsWithTeachers;
    }

    public function doesExist($name, $class)
    {
        return $this->model->where(['name' => $name, 'class_level_id' => $class])->first();
    }
}
