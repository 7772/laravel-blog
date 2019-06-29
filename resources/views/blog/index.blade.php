
@extends('layouts.app')

@section('content')


    <div class="container">
        @if (!empty($posts))
            <ul>
                @foreach ($posts as $post)
                    <a href="{{ route('post.detail', 'Post Detail', ['id' => $post->id]) }}">
                        <div style="width: 70em; height: 15em; overflow: hidden; margin-bottom: 50px; background-color: #f3f3f6; padding: 10px;">
                            <div class="" style="border-bottom: 2px solid #262933">
                                <div class="d-flex">
                                    <h1 class="mr-auto p-2 align-self-center">{{ $post->title }}</h1>
                                    <h6 class="p-2 align-self-center">{{ $post->created_at->diffForHumans() }}</h6>
                                </div>
                            </div>
                            <div style="padding-top: 10px;">
                                <h2>{{ str_limit($post->content, 10, '...') }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </ul>
        @else
            <p>아직 글이 없어요!</p>
        @endguest
    </div>
@endsection
