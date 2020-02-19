@extends('layouts.admin')

@section('content')
    
<h1><i class="fa fa-user" aria-hidden="true"></i> Replies</h1>

    @include('includes.notification')

    {{-- @if (count($replies) > 0) --}}

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
                        
                    @foreach ($replies as $reply)
                            
                    <tr>
                        <td scope="row">{{$reply->id}}</td>
                        <td><a href="{{route('replies.edit', $reply->id)}}">{{$reply->body}}</a></td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{$reply->created_at->diffForHumans()}}</td>
                        <td>{{$reply->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a>

                            @if ($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            {!! Form::hidden('is_active', 0) !!}

                            {!! Form::submit('Cancel', ['class'=>'btn btn-success']) !!}

                            {!! Form::close() !!}
                                
                            @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            {!! Form::hidden('is_active', 1) !!}

                            {!! Form::submit('Accept', ['class'=>'btn btn-info']) !!}

                            {!! Form::close() !!}
                                
                            @endif

                            {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}


                        </td>
                    </tr>
                    
                    @endforeach
                                        
                </tbody>
        </table>
    </div>

{{-- @endif --}}

@endsection