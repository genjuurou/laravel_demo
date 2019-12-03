@extends('layouts.app')

@section('content')
  @if ($posts->isNotEmpty())
    @foreach ($posts as $post)
    <article class="media box pt-3 pb-4 pr-4 pl-2 mb-3">
        <img class="rounded-circle user-img mr-2" src="#">
        <div class="media-body">
        <div class="border-bottom">
            <a class="mr-2" href="#">{{ $post->user->name }}</a>
            <small class="text-muted">{{ $post->updated_at }}</small>
        </div>
            <h2 class="pt-2"><a href="{{ $post->path() }}">{{ $post->title }}</a></h2>
            <p class="pt-2">{{ $post->content }}</p>
        </div>
    </article>
    @endforeach

    <div class="mb-4 text-center">
        {{ $posts->links() }}
    </div>
  @else
      <h4 class="text-center">No posts yet..</h4>
  @endif
  @endsection