@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
       @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create Post</h1>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-form-label ">Type Your Post here</label>
            
                        <input id="content" type="text" 
                        class="form-control @error('content') is-invalid @enderror"
                        name="content" 
                        value="{{ old('content') }}" r
                        equired autocomplete="content" 
                        autofocus>
            
                        @error('content')
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
                    <button class="btn btn-primary">Create Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
    
@endsection