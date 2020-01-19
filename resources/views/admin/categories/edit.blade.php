@extends('layouts.admin')

@section('content')
<h1><i class="fa fa-user" aria-hidden="true"></i> Categories</h1>
    
    @include('includes.formerrors')

    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

    <div class="col-sm-4">
        <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    
    
@endsection