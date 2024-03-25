@extends('layouts.app')
@section('title', 'User Show')
@section('content')
    <h1 class="my-5 text-center">User Show</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header text-center bg-light">
                    <h5 class="card-title">{{ $user->nom }}</h5>
                </div>
                <div class="card-body bg-light">
                    <ul class="list-unstyled">
                        <li><strong>{{ __('Email') }}:</strong> {{ $user->email }}</li>
                        <li><strong>{{ __('Telephone') }}:</strong> {{ $user->telephone }}</li>
                        <li><strong>{{ __('Adresse') }}:</strong> {{ $user->adresse }}</li>
                        <li><strong>{{ __('Pcreation') }}:</strong> {{ $user->created_at }}</li>
                        <li><strong>{{ __('Pupdate') }}:</strong> {{ $user->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-sm btn-outline-success">{{ __('Edit') }}</a>
                    <form action="{{ route('users.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this Étudiant?')">{{ __('Delete') }}</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection
