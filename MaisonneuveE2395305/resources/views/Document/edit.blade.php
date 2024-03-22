@extends('layouts.app')

@section('title', 'Edit Document')

@section('content')
<div class="container">
    <h1>Edit Document</h1>
    <form action="{{ route('document.update', $document->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $document->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection