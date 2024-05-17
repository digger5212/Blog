@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Article Information</div>
                <div class="card-body">
                    <h1 class="text-center">{{ $topic->title }}</h1>
                    <p>Post At: <small>{{ $topic->created_at }}</small> <a href="{{ route('topic.edit', $topic->id) }}"
                            class="btn btn-info">Edit</a> <a href="javascript:deleteConfirm({{ $topic->id }});"
                            class="btn btn-danger btn-sm">Delete</a>
                    <form method="POST" action="{{ route('topic.destroy', $topic->id) }}"
                        id="delete-topic-{{ $topic->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    </p>
                    <hr>
                    <p> {{ $topic->content }} </p>
                </div>

                <h3>Comments</h3>
                <ul>
                    @foreach ($replies as $reply)
                        <li><small>{{ $reply->userName() }} ：</small>“ {{ $reply->content }} ”</li>
                    @endforeach
                </ul>
                <form method="POST" action="{{ route('reply.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                    <div class="form-group">
                        <label for="content"></label>
                        <textarea id="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" cols="30"
                            rows="10" name="content">Please enter you comment, thank you？</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">Add Comment</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
