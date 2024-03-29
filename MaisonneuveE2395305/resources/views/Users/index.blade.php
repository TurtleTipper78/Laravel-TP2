@extends('layouts.app')
@section('title', 'Student List')
@section('content')
    <h1 class="mt-5 mb-4 text-center">{{ __('StudentList') }}</h1>
    <div class="row">
        @forelse ($user as $users)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center card-body bg-light flex-column">
                        <h5 class="card-title">{{ $users->nom }}</h5>
                    </div>
                    <ul class="list-group list-group-flush list-unstyled mb-3">
                        <li><strong>Email:</strong> <span class="text-muted">{{ $users->email}}</span></li>
                        <li><strong>{{ __('Telephone') }}:</strong> <span class="text-muted">{{ $users->telephone }}</span></li>
                        
                        <li><strong>{{ __('Address') }}:</strong> <span class="text-muted">{{ $users->adresse }}</span></li>
                        <li><strong>{{ __('Pcreation') }}:</strong> <span class="text-muted">{{ $users->created_at }}</span></li>
                        <li><strong>{{ __('Pupdate') }}:</strong> <span class="text-muted">{{ $users->updated_at }}</span></li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('users.show', $users->id) }}" class="btn btn-sm btn-outline-primary">{{ __('Show') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-danger">There are no users to display!</div>
            </div>
        @endforelse
    </div>
@endsection
