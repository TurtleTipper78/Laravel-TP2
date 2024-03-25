@extends('layouts.app')
@section('title', 'Create Document')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">{{ __('CreateDocu') }}</h1>
    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">{{ __('Title') }}:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file" class="form-label">{{ __('Document') }}:</label>
            <input type="file" name="file" id="file" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
    </form>
</div>
@endsection
