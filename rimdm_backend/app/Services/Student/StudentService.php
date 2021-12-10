<?php

namespace App\Services\Student;

use App\DataObjects\User;
use App\Repository\UserRepository\IUserRepository;

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
        $studentData->image->move(public_path(env('STUDENT_IMAGE_PATH')), $imageName);
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

        return $student;
    }

    public function getStudentsOfSpecificClass($classId)
    {
        return $this->userRepository->getStudentsOfSpecificClass($classId);
    }
}
