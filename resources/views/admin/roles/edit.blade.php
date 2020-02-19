@extends('layouts.admin')

@section('content')
<h1><i class="fa fa-user" aria-hidden="true"></i> Roles</h1>
    
    @include('includes.formerrors')

    {!! Form::model($role, ['method'=>'PATCH', 'action'=>['AdminRolesController@update', $role->id]]) !!}

    <div class="col-sm-4">
        <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            {!! Form::submit('Update Role', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminRolesController@destroy', $role->id]]) !!}
                {!! Form::submit('Delete Role', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection