@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Article Edit</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('topic.update', $topic->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="article title" name="title" value="{{ $topic->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" cols="30" rows="10" class="form-control" name="content">{{ $topic->content }}</textarea>
                        </div>
                        <p>Post At: <small>{{ $topic->created_at }}</small></p>
                        <p>Update At:<small>{{ $topic->updated_at }}</small></p>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection