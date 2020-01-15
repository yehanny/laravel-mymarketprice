@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Edit User</h1>

    @include('includes.formerrors')

    <div class="col-md-3">
    <img src="{{$user->photo ? $user->photo->file : '/images/noimage400x400.jpg'}}" class="img-fluid img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </div>
    <div class="col-md-9 pb-3">

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

        {{-- Open row --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="p-3 m-3 border bg-light">
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
          
        {!! Form::close() !!}

            <div class="col-sm-6">
                <div class="p-3 border bg-light pull-right">
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
        {{-- Close row --}}

    </div>

@endsection