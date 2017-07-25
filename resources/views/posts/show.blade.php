@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        @include('posts.post')

        <div class="alert alert-info">
          @if(count($post->tags))
            <span>Tags:</span>
            @foreach($post->tags as $tag)
              <a class="btn btn-outline-primary btn-sm" href="/posts/tags/{{$tag->name}}">
                {{ $tag->name }}
              </a>
            @endforeach
          @endif
        </div>
    
    <h5>Comments:</h5>

    @if(count($post->comments))

          <div class="offset-sm-1 col-sm-12">
            @foreach($post->comments as $comment)
              @include('posts.comment')
            @endforeach
          </div>
      @else
        <p class="offset-sm-1">No comments</p>
      @endif

      <div class="card offset-sm-1">
        <div class="card-block">
          <form action="/posts/{{ $post->id }}/comment" method="POST">
            <div class="form-group{{ count($errors) ? ' has-danger' : '' }}">
              <textarea name="body" id="cbody" rows="2" class="form-control" placeholder="Your comment..."></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-{{ count($errors) ? 'danger' : 'primary' }}">Post</button>
            </div>
            {{ csrf_field() }}
            
          </form>

          @include('layouts.errors')
        </div>
      </div>
    </div>

@stop