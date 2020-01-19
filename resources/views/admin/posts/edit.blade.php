@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Edit Post</h1>

    @include('includes.formerrors')

    <div class="col-md-4">
    <img src="{{$post->photo ? $post->photo->file : '/images/noimage400x400.jpg'}}" class="img-fluid img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </div>
    <div class="col-md-8 pb-3">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

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

        {{-- Open row --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="p-3 m-3 border bg-light">
                    {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
          
        {!! Form::close() !!}

            <div class="col-sm-6">
                <div class="p-3 border bg-light pull-right">
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
        {{-- Close row --}}

    </div>

@endsection