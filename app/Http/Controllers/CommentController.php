<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
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

    public function store($post){
 
        $data=request()->validate(['context'=>'required']);

        $data['user_id']=auth()->user()->id;
        $data['post_id']=$post;
        \App\Models\Comment::create($data);
        return Redirect::back(); 
    }
}
