@extends('layouts.app')
@section('title', 'Info User')
@section('content')
    <h1 class="mt-5 mb-4 text-center">Please add personal information{{ __('Registration') }}</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body bg-light">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nom" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $user->nom)}}">
                            @error('nom')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">{{ __('Address') }}</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="3">{{ old('adresse', $user->adresse) }}</textarea>
                            @error('adresse')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                            @error('telephone')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_de_naissance" class="form-label">{{ __('dob') }}</label>
                            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance', $user->date_de_naissance) }}">
                            @error('date_de_naissance')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ville_id" class="form-label">{{ __('City') }}</label>
                            <input type="number" class="form-control" id="ville_id" name="ville_id" value="{{ old('ville_id', $user->ville_id) }}">
                            @error('ville_id')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
