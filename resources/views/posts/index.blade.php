@extends('layouts.app')


@section('content')

   <ul>
       @foreach($posts as $post)
           <div class="image-container">
                <img src="{{$post->path}}" height="100">
           </div>
           <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
           @endforeach
   </ul>
    @endsection