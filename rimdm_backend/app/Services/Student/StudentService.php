<?php

namespace App\Services\Student;

use App\Repository\UserRepository\IUserRepository;

class StudentService implements IStudentService
{
    Public $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
