@extends('layouts.app')


@section('content')
    <h1>Edit Post</h1>
    {{--<form method="POST" action="/posts/{{$post->id}}">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        {{--<input type="text" name="title" placeholder="Please Enter the title" value="{{$post->title}}">--}}
        {{--<input type="submit" name="submit" value="UPDATE">--}}
    {{--</form>--}}
    {!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
    {{csrf_field()}}
   <div class="form-group">
       {!! Form::label('title', 'Title:') !!}
       {!! Form::text('title', null, ['class'=>'form-control']) !!}
   </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
    </div>
   {!! Form::close() !!}


   {{--<form method="post" action="/posts/{{$post->id}}">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="hidden" name="_method" value="DELETE">--}}
        {{--<input type="submit" value="DELETE">--}}
    {{--</form>--}}

    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
    {{csrf_field()}}
        <div class="form-group">
            {!! Form::submit('Delete Post') !!}
        </div>
    {!! Form::close() !!}

@endsection