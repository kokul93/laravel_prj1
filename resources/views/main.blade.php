@extends('layouts.app')

@section('content')


<div class="container">
@foreach ($posts as $post)
    <div class="card pb-2 pt-2 pr-1">

                <div class="container align-items-baseline pt-2"> 
                    <div align="left">
                    <h4> <a href="{{url('/profile/'.$post->user_id)}} ">{{\App\Models\User::find($post->user_id)->username}}</a></h4>
                    </div>        
                    <h3>{{$post->content}}</h3>
                </div>
                <div align="right" class="pr-2 pb-1">                               
                    Posted on {{$post->created_at}}
                </div>
                @if ($post->comments->count()!=0)
                    @foreach ($post->comments as $comment  )
                    <div class="pl-2 pb-2">
                        <div class="card justify-content-between align-items-baseline pl-1">         
                        <div> 
                            {{$comment->context}} 
                            </div>
                            <div align="right">
                                    <a href="{{url('/profile/'.$comment->user_id)}} ">{{\App\Models\User::find($comment->user_id)->username}}</a> commented on {{$comment->created_at}}
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    
                @endif
                <br>

                <form action="/cmt/{{$post->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group pl-2">
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
                <div class="pl-2">
                <button class="btn btn-outline-danger" style="font-size:x-small;">Add comment</button>
                </div>
                </form>
    </div>
    

    @endforeach
 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$posts->links()}}
        </ul>
        <style>
        .w-5{
            display: none;
        }
        </style>
    </nav>
</div>
@endsection