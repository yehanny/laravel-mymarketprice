@extends('layouts.admin')

@section('content')
    
<h1><i class="fa fa-user" aria-hidden="true"></i> Comments</h1>

    @include('includes.notification')

    <div>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Id</th>
                    <th>Body</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if ($comments)
                        
                    @foreach ($comments as $comment)
                            
                    <tr>
                        <td scope="row">{{$comment->id}}</td>
                        <td><a href="{{route('comments.edit', $comment->id)}}">{{$comment->body}}</a></td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('home.post', $comment->post->id)}}">View Post</a>

                            @if ($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            {!! Form::hidden('is_active', 0) !!}

                            {!! Form::submit('Cancel', ['class'=>'btn btn-success']) !!}

                            {!! Form::close() !!}
                                
                            @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            {!! Form::hidden('is_active', 1) !!}

                            {!! Form::submit('Accept', ['class'=>'btn btn-info']) !!}

                            {!! Form::close() !!}
                                
                            @endif

                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}


                        </td>
                    </tr>
                    
                    @endforeach
                    
                    @endif
                </tbody>
        </table>
    </div>

@endsection