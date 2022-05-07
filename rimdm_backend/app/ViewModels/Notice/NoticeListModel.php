<?php
namespace App\ViewModels\Teacher;

use App\Services\Teacher\ITeacherService;

class FrontTeachersModel
{
    private $teacherService;
    public $teachers;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }
}
