@extends('layouts.app')
@section('title', $article->titre)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $article->titre }}</h2>
                <p>{{ $article->texte }}</p>
                <p><strong>Published:</strong> {{ $article->date_de_creation->format('M d, Y') }}</p>
                <p><strong>Author:</strong> {{ $article->user->nom }}</p>
                <p><strong>Language:</strong> {{ $article->langue }}</p>

                @if(Auth::id() == $article->user_id)
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('article.delete', $article->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                    </form>
                @endif

                <a href="{{ route('article.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
