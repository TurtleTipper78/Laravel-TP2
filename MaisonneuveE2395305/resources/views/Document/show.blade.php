@extends('layouts.app')
@section('title', $document->title)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $document->title }}</h1>
                    <p class="card-text"><strong>{{ __('UploadOn') }}:</strong> {{ $document->user->name }}</p>
                    <p class="card-text"><strong>{{ __('UpdateOn') }}:</strong> {{ $document->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
