@extends('layouts.app')

@section('content')
<article class="media box pt-3 pb-4 pr-4 pl-2">
  <img class="rounded-circle user-img mr-2" src="{{ asset('storage/imgs/'.$profile->image) }}">
  <div class="media-body">
    <div class="border-bottom">
      {{ $profile->user->name }}
      <small class="ml-2 text-muted">{{ $profile->user->created_at }}</small>

      @can('update', $profile)
      <div class="pt-2 pb-2">
        <a class="btn btn-sm btn-outline-warning" href="{{ route('profile.edit', auth()->user()) }}">Edit</a>
      </div>
      @endcan

    </div>
      <h2 class="pt-2">About me</h2>
      <p class="pt-2">{{ $profile->info }}</p>
  </div>
</article>
@endsection