<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utility\ILogger;

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
        dd('Nothing Done');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Nothing Done');
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
        dd('Nothing Done');
    }
}
