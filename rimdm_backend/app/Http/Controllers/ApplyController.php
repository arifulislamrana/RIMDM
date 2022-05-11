<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function apply()
    {
        return view('apply');
    }

    public function applyPost(Request $request)
    {
        dd($request);
    }
}
