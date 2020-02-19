@extends('layouts.blog-post')

@section('content')

@include('includes.notification')

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->

    @if (Auth::check())
        
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        {!! Form::hidden('post_id', $post->id) !!}

        <div class="form-group">
        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3, 'placeholder'=>'Type your comment here']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    
    @else

    <p>You need to be logged in to post a comment <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a></p>
    
    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if (count($comments) > 0)

    @foreach ($comments as $comment)
    
        <div class="media">
            <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                @if (count($comment->replies) > 0)
                    
                @foreach ($comment->replies as $reply)
                    
                <!-- Nested Comment -->
                    @if ($reply->is_active == 1)
                        <div class="nested-comment media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>

                            {{-- Reply Form --}}

                            <div class="comment-reply-container">

                                <button type="submit" class="toggle-reply btn btn-primary pull-right">Reply</button>

                                <div class="comment-reply col-sm-10">
                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                                    {!! Form::hidden('comment_id', $comment->id) !!}

                                    <hr>
                                    <div class="form-group">
                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Type your reply here...']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @endif
                <!-- End Nested Comment -->
            </div>
        </div>
    
        @endforeach

    @endif
@endsection

@section('scripts')

<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });

</script>
    
@endsection