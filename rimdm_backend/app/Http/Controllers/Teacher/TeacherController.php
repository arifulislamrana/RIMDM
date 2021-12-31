<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTeacher;
use App\Utility\ILogger;
use GuzzleHttp\RetryMiddleware;

class TeacherController extends Controller
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $teacherListModel = resolve('App\ViewModels\Teacher\TeacherListModel');
            $teacherListModel->load();

            return view('admin.teacher.teachers_list', ['teacherListModel' => $teacherListModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Teachers List", $e);
            return response()->json(['error' => 'Failed to show Teachers List'], 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
            return view('admin.teacher.create_teacher');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Create Teacher Form", $e);
            return response()->json(['error' => 'Failed to show Create Teacher Form'], 409);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeacher $request)
    {
        try
        {
            $createTeacherModel = resolve('App\ViewModels\Teacher\CreateTeacherModel');

            if ($request->password != $request->cpassword)
            {
                return redirect()->back()->withErrors(['invalid' => 'PassWord and Confirm PassWord Should Be Same']);
            }

            $teacher = $createTeacherModel->storeTeacherData($request);

            return redirect()->route('teachers.index');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Teacher Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('Nothing Done');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('Nothing Done');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('Nothing Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $teacherListModel = resolve('App\ViewModels\Teacher\TeacherListModel');

            if ($teacherListModel->destroyTeacherData($id))
            {
                return redirect()->back()->with('message', 'Teacher Data Removed');
            }
            else
            {
                return redirect()->back()->withErrors(['invalid' => 'Teacher Data cant be Removed at this time.']);
            }

        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Teacher Data cant be Removed at this time.", $e);

            return redirect()->back()->withErrors(['invalid' => 'Something Went Wrong. Try Later.']);
        }
    }
}
