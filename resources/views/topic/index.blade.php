@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Article List</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-info">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>DateTime</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $key => $topic)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $topic->title }}</td>
                                    <td>{{ $topic->created_at }}</td>
                                    <td>
                                        <a href="{{ route('topic.show', $topic->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-info">Edit</a>
                                        <a href="javascript:deleteConfirm({{ $topic->id }});"
                                            class="btn btn-danger btn-sm">Delete</a>
                                        <form method="POST" action="{{ route('topic.destroy', $topic->id) }}"
                                            id="delete-topic-{{ $topic->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{ $topics->links() }}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
