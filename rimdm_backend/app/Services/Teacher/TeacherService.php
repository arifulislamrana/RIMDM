<?php
namespace App\Services\Teacher;

use Exception;
use App\DataObjects\Teacher;
use App\Repository\RoleRepository\IRoleRepository;

use function PHPUnit\Framework\throwException;

use App\Repository\SubjectRepository\ISubjectRepository;
use App\Repository\TeacherRepository\ITeacherRepository;

class TeacherService implements ITeacherService
{
    protected $teacherRepository;
    protected $subjectRepository;
    protected $roleRepository;

    public function __construct(ITeacherRepository $teacherRepository,
    ISubjectRepository $subjectRepository, IRoleRepository $roleRepository)
    {
        $this->teacherRepository = $teacherRepository;
        $this->subjectRepository = $subjectRepository;
        $this->roleRepository = $roleRepository;
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



    public function saveTeacherData(Teacher $teacher)
    {
        $role = $this->roleRepository->getRoleByName('teacher');
        $teacher->role_id = $role->id;

        if ($teacher->image != null)
        {
            $imageName = time().rand(99, 100000000).'.'.$teacher->image->extension();
            $imagePath = "\\".str_replace('/', "\\",env('TEACHER_IMAGE_PATH'))."\\".$imageName;

            $this->teacherRepository->create([
                'name' => $teacher->name,
                'designation' => $teacher->designation,
                'qualification' => $teacher->qualification,
                'phone' => $teacher->phone,
                'email' => $teacher->email,
                'role_id' => $teacher->role_id,
                'img' => $imagePath,
                'password' => $teacher->password,
            ]);
            $teacher->image->move(public_path(env('TEACHER_IMAGE_PATH')), $imageName);
        }
        else
        {
            $this->teacherRepository->create([
                'name' => $teacher->name,
                'designation' => $teacher->designation,
                'qualification' => $teacher->qualification,
                'phone' => $teacher->phone,
                'email' => $teacher->email,
                'role_id' => $teacher->role_id,
                'img' => null,
                'password' => $teacher->password,
            ]);
        }
    }
}

?>
