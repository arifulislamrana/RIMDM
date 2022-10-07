<?php

namespace App\Http\Controllers\ClassLevel;

use App\Utility\ILogger;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassLevelController extends Controller
{
    private $logger;
    public $model;

    public function __construct(ILogger $logger, ClassLevel $classLevel)
    {
        $this->logger = $logger;
        $this->model = $classLevel;
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
            $classes = $this->model->all();

            if (count($classes) > 0)
            {
                return view('admin.classLevel.class_list', ['classes' => $classes]);
            }
            return redirect()->back()->withErrors(['invalid' => 'No Class Level Exist']);
        }
        catch (\Throwable $th)
        {
            $this->logger->write("error", "Failed to Class Level List", $th);

            return redirect()->back()->withErrors(['invalid' => 'Failed to Class Level List']);
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
            return view('admin.classLevel.create_class');
        }
        catch (\Throwable $th)
        {
            $this->logger->write("error", "Failed to Class create form", $th);

            return redirect()->back()->withErrors(['invalid' => 'Failed to Class create form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            if (empty($request->section))
            {
                $request->section = 'a';
            }

            $check = $this->model->where([
                ['name', '=', strtolower($request->name),],
                ['section', '=', strtolower($request->section),],
            ])->get();

            if (count($check) < 1)
            {
                $classes = $this->model->create([
                    'name' => strtolower($request->name),
                    'section' => strtolower($request->section),
                ]);

                return redirect()->route('classLevels.index')->with(['message' => 'New Class Created']);
            }
            return redirect()->back()->withErrors(['invalid' => 'This Class already Exist']);
        }
        catch (\Throwable $th)
        {
            $this->logger->write("error", "Cant create new class", $th);

            return redirect()->back()->withErrors(['invalid' => 'Cant create new class']);
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
        dd($id);
    }
}
