<?php
namespace App\ViewModels\Teacher;

use App\Http\Requests\CreateTeacher;
use App\Services\Role\IRoleService;
use App\Services\Teacher\ITeacherService;

class CreateTeacherModel
{
    private $teacherService;
    public $roles;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function storeTeacherData(CreateTeacher $request)
    {
        $teacher = $request->getObject();

        return $this->teacherService->saveTeacherData($teacher);
    }
}
