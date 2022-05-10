<?php
namespace App\ViewModels\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginModel
{
    public function isValidStudent(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        return Auth::attempt(['email' => $email, 'password' => $pass]);
    }
}
