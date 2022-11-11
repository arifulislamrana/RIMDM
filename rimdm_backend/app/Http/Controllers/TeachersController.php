<?php

namespace App\Http\Controllers;

use App\Repository\TeacherRepository\ITeacherRepository;
use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    private $logger;
    public $teacher;

    public function __construct(ILogger $logger, ITeacherRepository $teacher)
    {
        $this->logger = $logger;
        $this->teacher = $teacher;
    }

    public function index()
    {
        try
        {
            $frontTeachersModel = resolve('App\ViewModels\Teacher\FrontTeachersModel');
            $frontTeachersModel->load();

            return view('teachers', ['frontTeachersModel' => $frontTeachersModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Teachers List", $e);

            return response()->json(['error' => 'Failed to show Teachers List'], 409);
        }
    }

    public function showTeacher($id)
    {
        try
        {
            $teacherProfileModel = resolve('App\ViewModels\Teacher\TeacherProfileModel');
            $teacherProfileModel->load($id);

            return view('show_teacher', ['teacherProfileModel' => $teacherProfileModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Show Teacher profile", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to Show Teacher profile']);
        }
    }
}
