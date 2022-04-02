<?php
namespace App\ViewModels\Admin;

use App\Services\Teacher\ITeacherService;

class RemoveAdminModel
{
    private $teacherService;

    public function __construct(ITeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function removeFromAdminship($id)
    {
        return $this->teacherService->removeAdminship($id);
    }
}
