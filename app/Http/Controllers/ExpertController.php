<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index(){
        return view('expert-dashboard');
    }
    //
    public function requests()
    {
        $user = Auth::user()->load('fix');
        return view('expert.requests')->with('user',$user);
    }

    public function ratings()
    {
        $user = User::find(\auth()->user()->id);
        $user = $user->load('ratings');
        $rate = 0;
        foreach ($user->ratings as $rating){
            $rate += $rating->rating;
        }
        if ($rate > 0)
        $rate = $rate / $user->ratings->count();
        return view('expert.ratings')->with(['ratings'=> $user->ratings,'average' => $rate]);
    }
}
