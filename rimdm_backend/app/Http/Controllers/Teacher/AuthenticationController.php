<?php

namespace App\Http\Controllers\Teacher;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        try
        {
            $techerLoginModel = resolve('App\ViewModels\TeacherLoginModel');

            if ($techerLoginModel->isValidTeacher($request))
            {
                $request->session()->regenerate();

                return redirect()->route('teacher.profile');
            }

            return redirect()->back()
                ->withErrors(['invalid' => 'This email or password is wrong.'])
                ->withInput($request->only('email', 'remember'));
        }
        catch (Exception $e)
        {
            return response()->json(['error' => 'Failed to login'], 409);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('teacher.login');
    }
}
