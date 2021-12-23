<?php

namespace App\Services\Student;

use App\DataObjects\User;
use App\Repository\UserRepository\IUserRepository;
use Illuminate\Support\Facades\File;

class StudentService implements IStudentService
{
    Public $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function isStudentRollTaken(User $studentData)
    {
        if (count($this->userRepository->where([
            'roll' => $studentData->roll,
            'class_level_id' => $studentData->class_level_id
            ])->get()) > 0)
        {
            return true;
        }

        return false;
    }

    public function saveStudentData(User $studentData)
    {
        $imageName = time().rand(99, 100000000).'.'.$studentData->image->extension();
        $imagePath = "\\".str_replace('/', "\\",env('STUDENT_IMAGE_PATH'))."\\".$imageName;

        $student = $this->userRepository->create([
            'name' => $studentData->name,
            'roll' => $studentData->roll,
            'f_name' => $studentData->f_name,
            'm_name' => $studentData->m_name,
            'dob' => $studentData->dob,
            'phone' => $studentData->phone,
            'email' => $studentData->email,
            'password' => bcrypt($studentData->password),
            'created_at' => now(),
            'updated_at' => now(),
            'class_level_id' => $studentData->class_level_id,
            'image' => $imagePath,
            'address' => $studentData->address,
        ]);

        $studentData->image->move(public_path(env('STUDENT_IMAGE_PATH')), $imageName);

        return $student;
    }

    public function getStudentsOfSpecificClass($classId)
    {
        return $this->userRepository->getStudentsOfSpecificClass($classId);
    }

    public function removeStudent($id)
    {
        return $this->userRepository->destroy($id);
    }

    public function getStudentById($id)
    {
        $student = $this->userRepository->find($id);

        if (empty($student))
        {
            return redirect()->back()
        	->withErrors(['invalid' => 'No Such Student Exists.']);
        }

        return $student;
    }

    public function updateStudent(User $studentData, $id)
    {
        if ($studentData->image != null)
        {
            $imageName = time().rand(99, 100000000).'.'.$studentData->image->extension();
            $imagePath = "\\".str_replace('/', "\\",env('STUDENT_IMAGE_PATH'))."\\".$imageName;
            $oldStudentData = $this->userRepository->find($id);

            if(File::exists(public_path($oldStudentData->image)))
            {
                File::delete(public_path($oldStudentData->image));
            }

            $this->userRepository->update($id, [
                'name' => $studentData->name,
                'roll' => $studentData->roll,
                'f_name' => $studentData->f_name,
                'm_name' => $studentData->m_name,
                'dob' => $studentData->dob,
                'phone' => $studentData->phone,
                'email' => $studentData->email,
                'updated_at' => now(),
                'class_level_id' => $studentData->class_level_id,
                'image' => $imagePath,
                'address' => $studentData->address,
            ]);
            $studentData->image->move(public_path(env('STUDENT_IMAGE_PATH')), $imageName);
        }
        else
        {
            $this->userRepository->update($id, [
                'name' => $studentData->name,
                'roll' => $studentData->roll,
                'f_name' => $studentData->f_name,
                'm_name' => $studentData->m_name,
                'dob' => $studentData->dob,
                'phone' => $studentData->phone,
                'email' => $studentData->email,
                'updated_at' => now(),
                'class_level_id' => $studentData->class_level_id,
                'address' => $studentData->address,
            ]);
        }

        return $this->userRepository->find($id);
    }
}
