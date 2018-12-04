@extends('layouts.app');

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ action('PostController@update',$post->id) }}" method="post">
    {{--  <form action="{{ url('update/'.$post->id) }}" method="post">  --}}
    {{--  <form action="{{ route('post.update', $post->id) }}" method="PUT">  --}}
        <div class="form-group">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">  
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" placeholder="title">
            <label for="body">Body</label>
            <textarea name="body" id="article-ckeditor" class="form-control" placeholder="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{--  @if (count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found</p>
    @endif  --}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection