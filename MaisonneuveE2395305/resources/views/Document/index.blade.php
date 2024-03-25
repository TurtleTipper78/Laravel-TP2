@extends('layouts.app')
@section('title', 'Document Index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="my-5 text-center">{{ __('DocuList') }}</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('document.create') }}" class="btn btn-primary">{{ __('AddDocu') }}</a>
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
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Users') }}</th>
                            <th>{{ __('UploadOn') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($document as $documents)
                        <tr>
                            <td>{{ $documents->title }}</td>
                            <td>{{ $documents->user->name }}</td>
                            <td>{{ $documents->created_at->format('M d, Y') }}</td>
                            <td>
                            @if(auth()->check() && $documents->user_id == auth()->user()->id)
                                <a href="{{ route('document.edit', $documents->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                                <form action="{{ route('document.delete', $documents->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">{{ __('Delete') }}</button>
                                </form>
                            @endif
                                <a href="{{ asset($documents->docu_path) }}" class="btn btn-secondary">{{ __('Show') }}</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $documents->links }}
            @endif
        </div>
    </div>
</div>
@endsection
