@extends('layouts.admin')

@section('content')
    
<h1><i class="fa fa-user" aria-hidden="true"></i> Media</h1>

    @include('includes.notification')

    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
                @if ($photos)
                    @foreach ($photos as $photo)
                    <tr>
                        <td scope="row">{{$photo->id}}</td>
                        <td><img src="{{$photo->file}}" alt="" style="max-height:40px"></td>
                        <td>{{$photo ? $photo->created_at->diffForHumans() : 'Date unknow'}}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
    </table>

@endsection