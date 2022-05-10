<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function loginPost(Request $request)
    {
        try
        {
            $studentLoginModel = resolve('App\ViewModels\Student\LoginModel');

            if ($studentLoginModel->isValidStudent($request))
            {
                $request->session()->regenerate();

                return redirect()->route('student.show', ['id' => Auth::id()]);
            }

            return redirect()->back()
                ->withErrors(['invalid' => 'This email or password is wrong.'])
                ->withInput($request->only('email', 'remember'));
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to login", $e);
            return response()->json(['error' => 'Failed to login'], 409);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function show($id)
    {
        try
        {
            $studentData = resolve('App\ViewModels\Student\StudentProfileModel');
            $studentData->load($id);

            return view('student.profile', ['studentData' => $studentData]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show student Profile", $e);

            return redirect()->back()->withErrors(['invalid' => 'Unable To Show Student Data.']);
        }
    }

}
