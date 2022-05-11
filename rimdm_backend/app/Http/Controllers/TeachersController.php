<?php

namespace App\Http\Controllers;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class TeachersController extends Controller
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
}
