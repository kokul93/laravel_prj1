<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
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


    public function create(){

        return view('post/create');
    }


    public function store(){
 
        $data=request()->validate([
            'content'=>'required',
        ]);
        auth()->user()->posts()->create($data);
        return redirect('profile/'.auth()->user()->id);
    }
}
