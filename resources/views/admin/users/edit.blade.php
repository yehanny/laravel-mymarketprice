@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Edit User</h1>

    @include('includes.formerrors')

    <div class="col-md-3">
    <img src="{{$user->photo ? $user->photo->file : '/images/noimage400x400.jpg'}}" class="img-fluid img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </div>
    <div class="col-md-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1=>'Active', 0=>'Inactive'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', [''=>'Choose option'] + $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection