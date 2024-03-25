@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Edit Article</h2>
                <form action="{{ route('article.update', $article->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titre">{{ __('Title') }}:</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{{ $article->titre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="texte">{{ __('Content') }}:</label>
                        <textarea class="form-control" id="texte" name="texte" rows="6" required>{{ $article->texte }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="langue">{{ __('Language') }}:</label>
                        <input type="text" class="form-control" id="langue" name="langue" value="{{ $article->langue }}" required>
                    </div>
                    <button type="submit" class="btn btn-secondary text-white border-0">{{ __('Update') }}</button>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-muted text-white">{{ __('Cancel') }}</a>

                </form>
            </div>
        </div>
    </div>
@endsection
