@extends('layouts.app')

@section('content')
<div class="container">
    @can('view',$user->profile)
        <a href="{{url('/profile/'.Auth::user()->id)}}">
        <button type="button" class="btn btn-outline-info">Profile</button>
        </a>
    @endcan

    <div class="row">
        <div class="col-3 p-5">
            <img src="https://i.pinimg.com/550x/f0/a7/0f/f0a70fce4bb761dbb403f0d18e8f9132.jpg" style="height:120px;" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
            @can('update',$user->profile)
                    <a href="/p/create"><strong>Add New Post</strong></a>
            @endcan                   
            </div>
            @can('update',$user->profile)
            <a href="{{$user->id}}/edit"><strong>Edit Profile</strong></a>
            @endcan
            
           @if ($user->posts)
                <div class="d-flex">
                    <div class="pr-4"><strong>{{$user->posts->count()}}</strong> posts</div>
                </div>
                <div class="pt-3 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div class="font-weight-bold"><a href="#">{{$user->profile->url??"N/A"}}</a></div>
                </div>
        </div>
        @foreach ($user->posts as $post)
        <div class="card pb-2 pt-2 pr-1">
            <div class="container justify-content-between align-items-baseline">         
                <h3>{{$post->content}}</h3>
            </div>
            <div align="right">                               
                Posted on {{$post->created_at}}
            </div>
            @if ($post->comments->count()!=0)
                @foreach ($post->comments as $comment  )
                <div class="card justify-content-between align-items-baseline">         
                   <div> 
                       {{$comment->context}} 
                    </div>
                    <div align="right">
                            <a href="{{url('/profile/'.$comment->user_id)}} ">{{\App\Models\User::find($comment->user_id)->username}}</a> commented on {{$comment->created_at}}
                    </div>
                </div>
                @endforeach 
                
            @endif
            <form action="/cmt/{{$post->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                  <input id="context" type="text" 
                        class="form-control @error('context') is-invalid @enderror"
                        name="context" 
                        value="{{ old('context') }}" r
                        equired autocomplete="context" 
                        autofocus style="height:25px;" placeholder="Enter Your Comment">
            
                        @error('context')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button class="btn btn-outline-danger" style="font-size:x-small;">Add comment</button>
            </form>
        </div>
        <br>
        @endforeach
        @endif       
    </div>    

</div>
@endsection
