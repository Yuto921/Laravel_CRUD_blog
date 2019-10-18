@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h1>
    <a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
    Blog Posts
</h1>
    <ul>
        {{--
        @foreach ($posts as $post)
            <li><a href="">{{ $post->title }}</a></li>
        @endforeach
        --}}

        @forelse ($posts as $post)
            <!-- <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li> -->
            <!-- <li><a href="/posts/{{ url('/posts', $post->id) }}">{{ $post->title }}</a></!--> 
            <!-- <li><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></li> -->
            <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
        @empty
            <li>No posts yet</li>
            {{--
                $postの中身が空のときに処理されるやつ
            --}}
        @endforelse
    </ul>
@endsection