@extends('layouts.admin')

@section('content')
    
<h1><i class="fa fa-user" aria-hidden="true"></i> Comments</h1>

    @include('includes.notification')

    <p>Author: {{$comment->author}}</p>
    <p>Created: {{$comment->created_at->diffForHumans()}}</p>
    <p>Updated: {{$comment->updated_at->diffForHumans()}}</p>

    {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

    <div class="col-sm-4">
        <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::text('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            {!! Form::submit('Update Comment', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                {!! Form::submit('Delete Comment', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection