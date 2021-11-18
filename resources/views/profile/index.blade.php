@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileimage()}}" style="height:120px;" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>                  
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
        @can('update',$user->profile)

            <div class="container pl-2 pt-5 pb-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Create A Post
                </button>   

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create A Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/p" enctype="multipart/form-data" method="post" >
                                @csrf
                                <!-- <div class="col-8 offset-2"> -->     
                                <div class="form-group pl-1 row">
                                <!-- <label for="content" class="col-form-label ">Type Your Post here</label> -->
                        
                                    <textarea id="content" type="text" 
                                    class="form-control "
                                    name="content" 
                                    value="{{ old('content') }}" r
                                    equired autocomplete="content" 
                                    autofocus placeholder="Enter What you feel today!!!" rows="4">
                                    </textarea>
                        
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!-- </div> -->
                                    </div>
                            
                                    <div class="row">
                                    <!-- <div class="col-8 offset-2"> -->
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Create Post</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    
                                    <!-- </div> -->
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @foreach ($userPosts as $post)
        
        <div class="card pb-2 pt-2">
            <div class="container justify-content-between align-items-baseline">         
                <h3>{{$post->content}}</h3>
            </div>
            <div align="right">                               
                Posted on {{$post->created_at}}
            </div>
            @if ($post->comments->count()!=0)
                @foreach ($post->comments as $comment  )
                <div class="card justify-content-between align-items-baseline pt-1 pb-2">         
                   <div> 
                       {{$comment->context}} 
                    </div>
                    <div class="pl-0.5"align="right">
                        <img src="{{\App\Models\User::find($comment->user_id)->profile->profileimage()}}" style="height:20px;" class="rounded-circle">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{$userPosts->links()}}
            </ul>
            <style>
                .w-5{
                    display: none;
                }
            </style>
        </nav>
        @endif       
    </div>    

</div>
@endsection
