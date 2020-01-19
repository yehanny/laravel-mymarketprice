@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Create Post</h1>

    @include('includes.formerrors')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

    <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('body', 'Description:') !!}
      {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('category_id', 'Category:') !!}
      {!! Form::select('category_id', [''=>'Choose'] + $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('photo_id', 'Photo:') !!}
      {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection