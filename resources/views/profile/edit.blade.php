@extends('layouts.app')

@section('content')

    <div class="box pt-3 pb-3 pr-4 pl-4">
        <form method="POST" action="{{ route('profile.update', $profile->user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <fieldset class="form-group border-bottom">
            <h2>Edit Profile</h2>
            </fieldset>

            <fieldset class="form-group">
                <label for="title">Profile image</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            </fieldset>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <fieldset class="form-group">
                <label for="info">Profile info</label>
                <textarea class="form-control @error('info') is-invalid @enderror" id="info" rows="3" name="info">{{ $profile->info }}</textarea>
            </fieldset>
            @error('info')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-outline-primary" type="submit">Update</button>
        </form>
    </div>

@endsection