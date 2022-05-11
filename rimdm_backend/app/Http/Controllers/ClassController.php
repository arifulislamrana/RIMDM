<?php

namespace App\Http\Controllers;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
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
}
