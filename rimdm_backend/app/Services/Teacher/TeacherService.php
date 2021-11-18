<?php
namespace App\Services\Teacher;

use App\Repository\TeacherRepository\ITeacherRepository;
use Exception;

use function PHPUnit\Framework\throwException;

class TeacherService implements ITeacherService
{
    protected $teacherRepository;

    public function __construct(ITeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function getTeacherByEmail($email)
    {
        $teacher = $this->teacherRepository->getTeacherByEmail($email);

        if (empty($teacher))
        {
            throw new Exception("Teacher does not exist");
        }

        return $teacher;
    }
}

?>
