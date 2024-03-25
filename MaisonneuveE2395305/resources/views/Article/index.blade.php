@extends('layouts.app')
@section('title', 'Articles')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Articles</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($articles->isEmpty())
                    <p>No articles found.</p>
                @else
                    <div class="list-group">
                        @foreach ($articles as $article)
                            <a href="{{ route('article.show', $article->id) }}" class="list-group-item list-group-item-action">
                                <h4 class="list-group-item-heading">{{ $article->titre }}</h4>
                                <p class="list-group-item-text">{{ __('UploadOn') }}: {{ $article->date_de_creation->format('M d, Y') }}</p>
                                <p class="list-group-item-text">{{ __('Auteur') }}: {{ $article->user->nom }}</p>
                                <p class="list-group-item-text">{{ __('Language') }}: {{ $article->langue }}</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <a href="{{ route('article.create') }}" class="btn btn-secondary btn-lg btn-block">{{ __('CreateArticle') }}</a>
            </div>
        </div>
    </div>
@endsection
