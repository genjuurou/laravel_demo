@extends('layouts.app')

@section('content')

    <div class="box pt-3 pb-3 pr-4 pl-4">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            
            <fieldset class="form-group border-bottom">
            <h2>Create Post</h2>
            </fieldset>

            <fieldset class="form-group">
                <label for="title">Post title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            </fieldset>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <fieldset class="form-group">
                <label for="content">Post content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content') }}</textarea>
            </fieldset>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-outline-primary" type="submit">Create</button>
        </form>
    </div>

@endsection