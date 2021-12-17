<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudent;
use App\Utility\ILogger;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            $StudentTableModel = resolve('App\ViewModels\Student\StudentsTableModel');
            $StudentTableModel->load($request);

            return view('admin.student_table', ['StudentTableModel' => $StudentTableModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Students List", $e);
            return response()->json(['error' => 'Failed to show Students List'], 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            $StudentClassesModel = resolve('App\ViewModels\Student\StudentsClassesModel');
            $StudentClassesModel->load();

            return view('admin.create_student', ['StudentClassesModel' => $StudentClassesModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Student Addmission Form", $e);
            return response()->json(['error' => 'Failed to show form'], 409);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudent $request)
    {
        try
        {
            $createStudentModel = resolve('App\ViewModels\Student\CreateStudentModel');

            if ($createStudentModel->isPasswordMismatch($request))
            {
                return redirect()->back()->withErrors(['invalid' => 'PassWord and Confirm PassWord Should Be Same']);
            }

            if ($createStudentModel->isStudentRollTaken($request))
            {
                return redirect()->back()->withErrors(['invalid' => 'This Roll in this class already been taken']);
            }

            $student = $createStudentModel->storeStudentData($request);

            //return ...................
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Student Data", $e);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $studentTableModel = resolve('App\ViewModels\Student\StudentsTableModel');

            if ($studentTableModel->destroyStudentData($id))
            {
                return redirect()->back()->with('message', 'Student Data Removed');
            }
            else
            {
                return redirect()->back()->withErrors(['invalid' => 'Student Data cant be Removed at this time.']);
            }

        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Student Data cant be Removed at this time.", $e);

            return redirect()->back()->withErrors(['invalid' => 'Something Went Wrong. Try Later.']);
        }
    }
}
