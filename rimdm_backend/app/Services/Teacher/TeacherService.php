<?php
namespace App\Services\Teacher;

use App\Repository\SubjectRepository\ISubjectRepository;
use App\Repository\TeacherRepository\ITeacherRepository;
use Exception;

use function PHPUnit\Framework\throwException;

class TeacherService implements ITeacherService
{
    protected $teacherRepository;
    protected $subjectRepository;

    public function __construct(ITeacherRepository $teacherRepository, ISubjectRepository $subjectRepository)
    {
        $this->teacherRepository = $teacherRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function getTeacherByEmail($email)
    {
        $teacher = $this->teacherRepository->getTeacherByEmail($email);

        if (empty($teacher))
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'No Teacher Exist For This Email.']);
        }

        return $teacher;
    }

    public function getAllTeacher()
    {
        $teachers = $this->teacherRepository->getAll();

        return $teachers;
    }

    public function removeTeacher($id)
    {
        $this->subjectRepository->closeRealtionWithTeacher($id);

        return $this->teacherRepository->destroy($id);
    }
}

?>
