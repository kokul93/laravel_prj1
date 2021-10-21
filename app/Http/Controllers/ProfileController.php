<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;


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
            'image'=>'image',
            'url'=>'url',
            'image'=>'',
        ]);
        dd($data);
        if(request('image')){
            $imagePath=request('image')->store('profiles/{auth()->user->id}','public');
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        auth()->user->profile()->update(array_merge(
            $data,
            ['image'=>$imagePath]
        ));
        
        /* 'title'=>$data['title'],
            'image'=>$imagePath,
            'description'=>$data['description'],
            'url'=>$data['url'], */

        return redirect('/profile/{auth()->user->id}');

    }
}