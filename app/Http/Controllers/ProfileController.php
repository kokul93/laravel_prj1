<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\User;
<<<<<<< HEAD
=======
=======

>>>>>>> dev
use Exception;
>>>>>>> dev
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;


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

            //$userPosts=$user->posts;
            $userPosts=Post::where('user_id','=',$user->id)->orderBy('created_at','DESC')->paginate(
                $perPage=3,$columns=['*'],$pageName='posts'
            );
            //$userPosts=Post::find($user->id)->orderBy('created_at','DESC')->paginate(5);


        return view('profile/index',compact('user'),['userPosts'=>$userPosts]);

    }


    public function edit(User $user){

        return view('profile/edit',compact('user'));
    }

    public function update(User $user){
<<<<<<< HEAD
        
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
=======
            
        $data=request()->validate([
            'title'=>'required',
            'image'=>['','image'],
        ]);  
        
        function randomString($n){
            $char='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str='';
            for($i=0;$i<$n;$i++){
                $index=rand(0,strlen($char)-1);
                $str.=$char[$index];
            }
            return $str;
        }
        
        if(request('image')){
            $imagePath=request('image')->store('profile/'.$user->id.'/'.randomString(8),'public');
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();
        };
        try{
        //auth()->user()->profile()->update($data);
        auth()->user()->profile()->update(array_merge(
            $data,
            ['image'=>$imagePath]
        ));
    }catch(exception $e){
        dd($e);
    }
       
>>>>>>> dev
        
        /* 'title'=>$data['title'],
            'image'=>$imagePath,
            'description'=>$data['description'],
            'url'=>$data['url'], */
<<<<<<< HEAD

        return redirect('/profile/{auth()->user->id}');

    }
=======
            

            return redirect('profile/'.auth()->user()->id);

    }

>>>>>>> dev
}