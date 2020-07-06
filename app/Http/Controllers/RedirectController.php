<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        switch ($user->roles()->first()->name){
            case 'Customer':
                return view('customer-dashboard');
            case 'Expert':
                return view('expert-dashboard');
            default:
                return view('admin-dashboard');

        }

    }
}
