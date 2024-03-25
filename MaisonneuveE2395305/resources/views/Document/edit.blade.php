@extends('layouts.app')
@section('title', 'Edit Document')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">{{ __('UpdateDocu') }}</h1>
    <form action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title" class="form-label">{{ __('Title') }}:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $document->title }}" required>
        </div>
        <div class="form-group">
            <label for="file" class="form-label">{{ __('File') }}:</label>
            <input type="file" name="file" id="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</div>
@endsection
