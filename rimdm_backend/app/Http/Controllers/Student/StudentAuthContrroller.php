<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAuthContrroller extends Controller
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        try
        {
            return view('student.login');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show Students login page", $e);
            return response()->json(['error' => 'Failed to show Students login page'], 409);
        }
    }
}
