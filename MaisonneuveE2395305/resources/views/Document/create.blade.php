@extends('layouts.app')

@section('title', 'Create Document')

@section('content')
<div class="container">
    <h1>Create Document</h1>
    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" name="file" id="file" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
