@extends('layouts.main')

@section('content')
    <div class="container col-md-4 offset-md-4 mt-4">
        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group mb-2">
                <label for="file">Poster:</label>
                <input type="file" class="form-control-file" id="poster" name="poster" accept=".jpeg, .jpg, .png">
            </div>

            <div class="form-group mb-2">
                <label>Publication status:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="publication_status" value="1">
                    <label class="form-check-label" for="radio1">true</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="publication_status" value="0" checked>
                    <label class="form-check-label" for="radio2">false</label>
                </div>
            </div>

            <div class="form-group mb-2">
                <label for="genres">Genres:</label>
                <select class="form-control" id="genres" name="genres[]" multiple>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Sumbit</button>
        </form>
    </div>
@endsection
