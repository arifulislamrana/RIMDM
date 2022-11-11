<?php

namespace App\Http\Controllers;

use App\Repository\ClassRepository\IClassRepository;
use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $logger;
    public $classRepository;

    public function __construct(ILogger $logger, IClassRepository $classRepository)
    {
        $this->logger = $logger;
        $this->classRepository = $classRepository;
    }

    public function index()
    {
        try
        {
            $homeModel = resolve('App\ViewModels\FrontHome\HomeModel');
            $classes = $homeModel->classes();
            $subjects = $homeModel->noOfsubjectsAcordingToClasses();

            return view('classes', ['classes' => $classes, 'noOfSubjects' => $subjects]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Something went wrong in classes page", $e);

            return response()->json(['error' => 'Oooppps something went wrong!!'], 409);
        }
    }

    public function showClass($id)
    {
        try
        {
            $class = $this->classRepository->find($id);

            return view('show_class', ['class' => $class]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Something went wrong in class page", $e);

            return response()->json(['error' => 'Oooppps something went wrong!!'], 409);
        }
    }
}
