<?php

namespace App\Http\Controllers\Subject;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
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
            $SubjectTableModel = resolve('App\ViewModels\Subject\SubjectListModel');
            $SubjectTableModel->load($request);

            return view('admin.subjects.subject_list', ['SubjectTableModel' => $SubjectTableModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show subject List", $e);
            return response()->json(['error' => 'Failed to show subject List'], 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            $CreateSubjectModel = resolve('App\ViewModels\Subject\CreateSubjectModel');
            $CreateSubjectModel->load();

            return view('admin.subjects.create_subject', ['CreateSubjectModel' => $CreateSubjectModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Subject create form", $e);
            return response()->json(['error' => 'Failed to show Subject create form'], 409);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        dd('hi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try
        {
            $SubjectTableModel = resolve('App\ViewModels\Subject\SubjectListModel');
            dd($id);

            return view('admin.subjects.subject_list', ['SubjectTableModel' => $SubjectTableModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show subject List", $e);
            return response()->json(['error' => 'Failed to show subject List'], 409);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd('hi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try
        {
            $SubjectTableModel = resolve('App\ViewModels\Subject\SubjectListModel');
            dd($id);

            return view('admin.subjects.subject_list', ['SubjectTableModel' => $SubjectTableModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show subject List", $e);
            return response()->json(['error' => 'Failed to show subject List'], 409);
        }
    }
}
