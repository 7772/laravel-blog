
@extends('layouts.app')

@section('content')


    <div class="container">
        @if (!empty($posts))
            <ul>
                @foreach ($posts as $post)
                    <div class="" style="border-bottom: 1px solid #8c8b8b">
                        <div class="d-flex">
                            <h1 class="mr-auto p-2 align-self-center">{{ $post->title }}</h1>
                            <h6 class="p-2 align-self-center">{{ $post->created_at->diffForHumans() }}</h6>
                        </div>
                    </div>
                @endforeach
            </ul>
        @else
            <p>zzz</p>
        @endguest
    </div>
@endsection
