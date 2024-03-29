<?php

namespace App\Http\Controllers\Subject;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubject;

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
    public function store(CreateSubject $request)
    {
        try
        {
            $CreateSubjectModel = resolve('App\ViewModels\Subject\CreateSubjectModel');
            if ($CreateSubjectModel->doesSubjectExist($request))
            {
                return redirect()->back()->withErrors(['invalid' => 'This Subject already Exists']);
            }
            $sub = $CreateSubjectModel->storeData($request);

            return redirect()->route('subjects.index', ['classId' => $sub->class_level_id]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to store subject data", $e);
            return response()->json(['error' => 'Failed to store subject data'], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        dd('why man why??!! Go back.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try
        {
            $SubjectUpdateModel = resolve('App\ViewModels\Subject\SubjectUpdateModel');
            $SubjectUpdateModel->load($id);

            return view('admin.subjects.update_subject', ['SubjectUpdateModel' => $SubjectUpdateModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show subject edit form", $e);
            return response()->json(['error' => 'Failed to show subject edit form'], 409);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSubject $request, $id)
    {
        try
        {
            $SubjectUpdateModel = resolve('App\ViewModels\Subject\SubjectUpdateModel');

            $sub = $SubjectUpdateModel->updateData($request, $id);

            return redirect()->route('subjects.index', ['classId' => $sub->class_level_id]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update subject data", $e);
            return response()->json(['error' => 'Failed to update subject data'], 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try
        {
            $SubjectTableModel = resolve('App\ViewModels\Subject\SubjectListModel');
            $subj = $SubjectTableModel->removeSubject($id);

            return redirect()->route('subjects.index', ['classId' => $subj->class_level_id]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to remove Subject", $e);
            return response()->json(['error' => 'Failed to remove Subject'], 409);
        }
    }
}
