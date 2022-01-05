<?php

namespace App\Services\ClassLevel;

use App\DataObjects\ClassSubjectTeacherList;
use Exception;
use App\Repository\ClassRepository\IClassRepository;
use App\Repository\SubjectRepository\ISubjectRepository;

class ClassService implements IClassService
{
    public $classRepository;
    public $subjectRepository;

    public function __construct(IClassRepository $classRepository, ISubjectRepository $subjectRepository)
    {
        $this->classRepository = $classRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function getAllClasses()
    {
        $classes = $this->classRepository->getAll();

        if (empty($classes))
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'No Class Exist.']);
        }

        return $classes;
    }

    public function getClassById($id)
    {
        $class = $this->classRepository->find($id);

        if (empty($class))
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'No Class Exists.']);
        }

        return $class;
    }

    public function classSubjectTeachersList($classId)
    {
        $subjects = $this->subjectRepository->getSubjectsByClassId($classId);

        if (empty($subjects))
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'Subject List is not Included.']);
        }

        $list = [];

        foreach ($subjects as $subject)
        {
            if ($subject->teacher != null)
            {
                $classSubjectTeacherList = new ClassSubjectTeacherList();
                $classSubjectTeacherList->subjectName = $subject->name;
                $classSubjectTeacherList->teacherName = $subject->teacher->name;
                $classSubjectTeacherList->teacherPhone = $subject->teacher->phone;
                $classSubjectTeacherList->image = $subject->teacher->img;
                array_push($list, $classSubjectTeacherList);
            }
            else
            {
                $classSubjectTeacherList = new ClassSubjectTeacherList();
                $classSubjectTeacherList->subjectName = $subject->name;
                $classSubjectTeacherList->teacherName = 'No Teacher Assigned';
                $classSubjectTeacherList->teacherPhone = null;
                $classSubjectTeacherList->image = null;
                array_push($list, $classSubjectTeacherList);
            }
        }

        return $list;
    }

}
