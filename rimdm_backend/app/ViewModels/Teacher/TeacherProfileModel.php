<?php
namespace App\ViewModels\Teacher;

use App\Services\Teacher\ITeacherService;

class TeacherProfileModel
{
    private $teacherService;
    public $teacher;
    public $teacherClassDetails = [];
    public $role;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function load($id)
    {
        $this->teacher = $this->getTeacher($id);
        $this->getTeacherSubjects($this->teacher);
        $this->role = $this->teacher->role->name;

    }

    public function getTeacher($id)
    {
        return $this->teacherService->getTeacherById($id);
    }

    public function getTeacherSubjects($teacher)
    {
        $subj = $this->teacher->subjects;
        $subject= array(
            'subject' => '',
            'class' => '',
        );
        foreach ($subj as $sub)
        {
            $subject['subject'] = $sub->name;
            $subject['class'] = $sub->classLevel->name;
            array_push($this->teacherClassDetails, $subject);
        }

        //dd($this->teacherClassDetails);
    }
}
