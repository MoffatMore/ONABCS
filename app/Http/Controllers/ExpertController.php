<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    //
    public function requests()
    {
        $user = Auth::user()->load('fix');
        return view('expert.requests')->with('user',$user);
    }

    public function ratings()
    {
        return view('expert.ratings');
    }
}
