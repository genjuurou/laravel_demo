@extends('layouts.app')

@section('content')
<article class="media box pt-3 pb-4 pr-4 pl-2">
  <img class="rounded-circle user-img mr-2" src="#">
  <div class="media-body">
    <div class="border-bottom">
      <a class="mr-2" href="#">{{ $post->user->name }}</a>
      <small class="text-muted">{{ $post->updated_at }}</small>

      @can('update', $post)
        <div class="pt-2 pb-2">
            <a class="btn btn-sm btn-outline-warning" href="{{ route('posts.edit', $post) }}">Edit</a>
            <a class="btn btn-sm btn-outline-danger" href="{{ route('posts.destroy', $post) }}"
            onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
            <form id="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
      @endcan
    </div>
      <h2 class="pt-2">{{ $post->title }}</h2>
      <p class="pt-2">{{ $post->content }}</p>
  </div>
</article>
@endsection