@extends('layouts.app')

@section('title', $document->title)

@section('content')
<div class="container">
    <h1>{{ $document->title }}</h1>
    <p><strong>Uploaded By:</strong> {{ $document->user->name }}</p>
    <p><strong>Uploaded On:</strong> {{ $document->created_at->format('M d, Y') }}</p>
    <!-- Add more details about the document if needed -->
</div>
@endsection
