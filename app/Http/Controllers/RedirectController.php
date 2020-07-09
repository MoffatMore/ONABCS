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
        if($user === null){
            return redirect()->route('login');
        }
        switch ($user->roles()->first()->name){
            case 'Customer':
                $notifications = auth()->user()->unreadNotifications;
                return redirect()->route('customer.dashboard');
            case 'Expert':
                return redirect()->route('expert.dashboard');
            default:
                return redirect()->route('admin.dashboard');

        }

    }
}
