@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Roles</h1>

    @include('includes.notification')

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
                {{-- <td>{{$role->users->id}}</td> --}}
                {{-- <td>{{$role->created_at->diffForHumans()}}</td>
                <td>{{$role->updated_at->diffForHumans()}}</td> --}}
            </tr>
            
            @endforeach
            
            @endif
        </tbody>
</table>

@endsection