@extends('layouts.app')
@section('title', 'Create Article')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Create New Article</h2>
                <form action="{{ route('article.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Title:</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="texte">Content:</label>
                        <textarea class="form-control" id="texte" name="texte" rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="langue">Language:</label>
                        <select class="form-control" id="langue" name="langue" required>
                            <option value="fr">Français</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('article.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
