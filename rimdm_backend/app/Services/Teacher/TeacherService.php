<?php
namespace App\Services\Teacher;

use Exception;
use App\DataObjects\Teacher;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\throwException;

use App\Repository\RoleRepository\IRoleRepository;
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
                'password' => bcrypt($teacher->password),
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
                'password' => bcrypt($teacher->password),
            ]);
        }
    }

    public function getTeacherById($id)
    {
        return $this->teacherRepository->find($id);
    }

    public function updateTeacher($id, Teacher $teacher)
    {
        if ($teacher->image != null)
        {
            $imageName = time().rand(99, 100000000).'.'.$teacher->image->extension();
            $imagePath = "\\".str_replace('/', "\\",env('TEACHER_IMAGE_PATH'))."\\".$imageName;
            $oldTeacherData = $this->teacherRepository->find($id);

            if(File::exists(public_path($oldTeacherData->image)))
            {
                File::delete(public_path($oldTeacherData->image));
            }

            $this->teacherRepository->update($id, [
                'name' => $teacher->name,
                'designation' => $teacher->designation,
                'qualification' => $teacher->qualification,
                'phone' => $teacher->phone,
                'email' => $teacher->email,
                'img' => $imagePath,
            ]);
            $teacher->image->move(public_path(env('TEACHER_IMAGE_PATH')), $imageName);
        }
        else
        {
            $this->teacherRepository->update($id, [
                'name' => $teacher->name,
                'designation' => $teacher->designation,
                'qualification' => $teacher->qualification,
                'phone' => $teacher->phone,
                'email' => $teacher->email,
            ]);
        }
    }

    public function changeRoleToAdmin($id)
    {
        $adminRole = $this->roleRepository->getRoleByName('admin');

        $this->teacherRepository->update($id, [
            'role_id' => $adminRole->id,
        ]);
    }
}

?>
