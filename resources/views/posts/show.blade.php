@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <h1>
        <a href="{{ url('/') }}" class="header-menu">Back</a>
        {{ $post->title }}
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <h2>Comments</h2>
    <ul>
        @forelse ($post->comments as $comment)
            <li>
                {{ $comment->body }}
                <a href="#" class="del" data-id="{{ $comment->id }}">[×]</a>
                <form action="{{ action('CommentsController@destroy', [$post, $comment]) }}" method="post" id="form_{{ $comment->id }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                </form>
            </li>
        @empty
            <li>No Comments yet</li>
        @endforelse
    </ul>
    <form action="{{ action('CommentsController@store', $post) }}" method="post">
        {{ csrf_field() }}
        <p>
            <input type="text" name="body" placeholder="enter body" value="{{ old('body') }}">
            @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="ADD Comment">
        </p>
    </form>
    <script src="/js/main.js"></script>
@endsection