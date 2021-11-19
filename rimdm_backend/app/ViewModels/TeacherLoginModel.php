<?php
namespace App\ViewModels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginModel
{
    public function isValidTeacher(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;
        $remember = $request->input('remember');

        if (Auth::guard('teacher')->attempt(['email' => $email, 'password' => $pass], $remember))
        {
            return true;
        }

        return false;
    }
}
