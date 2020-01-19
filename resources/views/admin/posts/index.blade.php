@extends('layouts.admin')

@section('content')
    <h1><i class="fa fa-user" aria-hidden="true"></i> Posts</h1>

    @include('includes.notification')

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Author</th>
            <th>Category</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if ($posts)
                
                @foreach ($posts as $post)
                        
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}"><img src="{{$post->photo ? $post->photo->file : '/images/noimage80x80.jpg'}}" class='img-fluid img-thumbnail ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}' alt="" style="max-width: 80px" ></a></td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                
                @endforeach
            
            @endif
        </tbody>
</table>

@endsection