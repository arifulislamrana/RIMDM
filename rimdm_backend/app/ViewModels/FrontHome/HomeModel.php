<?php
namespace App\ViewModels\FrontHome;

use Illuminate\Support\Facades\DB;
use App\Repository\UserRepository\IUserRepository;
use App\Repository\ClassRepository\IClassRepository;
use App\Repository\TeacherRepository\ITeacherRepository;

class HomeModel
{
    private $classService;
    private $studentService;
    private $teacherService;
    public $classes;
    public $totalClasses;
    public $totalStudents;
    public $totalTeachers;
    public $recentNotices;
    public $noOfsubjectsAcordingToClasses;

    public function __construct(
        IClassRepository $class,
        IUserRepository $student,
        ITeacherRepository $teacher
        )
    {
        $this->classService = $class;
        $this->studentService = $student;
        $this->teacherService = $teacher;
    }

    public function load()
    {
        $this->totalClasses = $this->totalClasses();
        $this->totalStudents = $this->totalStudents();
        $this->totalTeachers = $this->totalTeachers();
        $this->recentNotices= $this->getRecentNotices();
        $this->classes = $this->classes();
        $this->noOfsubjectsAcordingToClasses = $this->noOfsubjectsAcordingToClasses();
    }



    public function totalStudents()
    {
        return count($this->studentService->getAll());
    }

    public function totalTeachers()
    {
        return count($this->teacherService->getAll());
    }

    public function totalClasses()
    {
        return count($this->classService->getAll());
    }

    public function classes()
    {
        return $this->classService->getAll()->take(6);
    }

    public function getRecentNotices()
    {
        $notices = DB::table('notices')
            ->orderBy('id', 'desc')
            ->get()->take(2);

        return $notices;
    }

    public function noOfsubjectsAcordingToClasses()
    {
        $subjects = DB::table('subjects')
            ->selectRaw('count(id) as noOfSubjects, class_level_id')
            ->groupBy('class_level_id')
            ->get();

        $data = array();
        foreach ($subjects as $sub)
        {
            $data[$sub->class_level_id] = $sub->noOfSubjects;
        }
        return $data;
    }
}
