@extends('layouts.app')
@section('title', 'Update Document')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">Update Document</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $document->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
