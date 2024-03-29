<?php

namespace App\Http\Controllers;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;

class HomeController extends Controller
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
            $homeModel->load();

            return view('welcome', ['homeModel' => $homeModel]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Something went wrong in home page", $e);

            return response()->json(['error' => 'Oooppps something went wrong!!'], 409);
        }
    }
}
