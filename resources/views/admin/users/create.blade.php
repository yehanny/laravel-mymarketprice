@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Create User</h1>

    @include('includes.formerrors')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password', 'Password:') !!}
      {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('is_active', 'Status:') !!}
      {!! Form::select('is_active', array(1=>'Active', 0=>'Inactive'), 0, ['class'=>'form-control']) !!}
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
      {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection