<?php

namespace App\ViewModels\Student;

use App\DataObjects\User;
use App\Http\Requests\CreateStudent;
use App\Services\Student\IStudentService;

class CreateStudentModel
{
    public $studentService;

    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function storeStudentData(CreateStudent $request)
    {
        $studentData =  $request->getObject();

        return $this->studentService->saveStudentData($studentData);
    }

    public function isPasswordMismatch(CreateStudent $request)
    {
        if ($request->password != $request->cpassword)
        {
            return true;
        }

        return false;
    }

    public function isStudentRollTaken(CreateStudent $request)
    {
        return $this->studentService->isStudentRollTaken($request->getObject());
    }

}
