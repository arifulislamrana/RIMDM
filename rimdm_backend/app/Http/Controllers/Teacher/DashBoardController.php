<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function showTeacherwhoIsNotAdmin($id)
    {
        try
        {
            $teacherProfileModel = resolve('App\ViewModels\Teacher\TeacherProfileModel');
            $teacherProfileModel->load($id);

            return view('admin.teacher.profile', ['teacherProfileModel' => $teacherProfileModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Show Teacher profile", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to Show Teacher profile']);
        }
    }
}
