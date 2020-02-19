@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Roles</h1>

    @include('includes.notification')

    <div class="col-sm-3">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminRolesController@store']) !!}

        <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-9">

    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Users</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @if ($roles)
                @foreach ($roles as $role)
                    <tr>
                        <td scope="row">{{$role->id}}</td>
                        <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                        <td>{{$role->users->count()}}</td>
                        <td>{{$role->created_at ? $role->created_at->diffForHumans() : 'No date'}}</td>
                        <td>{{$role->updated_at ? $role->updated_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
    </table>
    </div>
@endsection