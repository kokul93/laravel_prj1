@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        
        @method('PATCH')
        @csrf


        
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-form-label ">Title</label>
             
                        <input id="title" type="text" 
                        class="form-control"
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}" r
                        equired autocomplete="title" 
                        autofocus>
            
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>
                <div class="form-group row">
                    <label for="description" class="col-form-label ">Description</label>
        
                    <input id="description" type="text" 
                    class="form-control"
                    name="description" 
                    value="{{ old('description') ?? $user->profile->description}}" r
                    equired autocomplete="description" 
                    autofocus>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                        <label for="url" class="col-form-label ">URL</label>
                
                            <input id="url" type="text" 
                            class="form-control "
                            name="url" 
                            value="{{ old('url') ?? $user->profile->url}}" r
                            equired autocomplete="url" 
                            autofocus>
                
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                </div>
                <div class="form-group row">
                        <label for="image" class="col-form-label ">Profile Image</label>
                
                            <input id="image" type="file" class="form-control-file "
                            name="image" 
                            value="{{ old('image') ?? $user->profile->image}}" r
                            equired autocomplete="image" 
                            autofocus>
                
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                </div>

            
                
            </div>
        
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
         
     </form>

</div>
@endsection
