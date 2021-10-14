<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user){


        return view('profile/index',compact('user'));

    }


    public function edit(User $user){

        return view('profile/edit',compact('user'));
    }

    public function update(User $user){

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $user->profile()->update($data);


        return redirect('/profile/'.$user->id);

    }
}