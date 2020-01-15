@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Users</h1>

    @include('includes.user_notification')

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if ($users)
                
            @foreach ($users as $user)
                       
            <tr>
                <td scope="row">{{$user->id}}</td>
                <td><a href="{{route('users.edit', $user->id)}}"><img src="{{$user->photo ? $user->photo->file : '/images/noimage80x80.jpg'}}" class='img-fluid img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}' alt="" style="max-width: 80px" ></a></td>
                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            
            @endforeach
            
            @endif
        </tbody>
</table>

@endsection