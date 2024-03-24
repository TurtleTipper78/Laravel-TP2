@extends('layouts.app')
@section('title', 'Document Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Document Index</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('document.create') }}" class="btn btn-primary">Add Document</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @if ($document->isEmpty())
                <p>No documents found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($document as $documents)
                        <tr>
                            <td>{{ $documents->title }}</td>
                            <td>{{ $documents->user->name }}</td>
                            <td>{{ $documents->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('document.edit', $documents->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('document.delete', $documents->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">Delete</button>
                                </form>
                                <a href="{{ asset('storage/documents/example.pdf') }}" class="btn btn-secondary">View Document</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
