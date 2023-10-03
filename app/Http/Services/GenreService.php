<?php

namespace App\Http\Services;

use App\Models\Genre;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GenreService
{
    public function getGenres()
    {
        $genres = Genre::all();

        return GenreResource::collection($genres);
    }

    public function saveGenre(GenreRequest $request)
    {
        $validatedData = $request->validated();

        $genre = Genre::create($validatedData);

        return (new GenreResource($genre))
            ->response()
            ->setStatusCode(201);
    }

    public function getGenre($genreId)
    {
        try {
            $genre = Genre::findOrFail($genreId);
            return new GenreResource($genre);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["genre" => ['Genre not found.']]], 404);
        }
    }

    public function updateGenre(GenreRequest $request, $genreId)
    {
        try {
            $validatedData = $request->validated();
            $genre = Genre::findOrFail($genreId);
            $genre->update($validatedData);
            return new GenreResource($genre);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["genre" => ['Genre not found.']]], 404);
        }
    }

    public function destroyGenre($genreId)
    {
        try {
            $genre = Genre::findOrFail($genreId);
            $genre->delete();
            return response()->json(['message' => 'Genre deleted!'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["genre" => ['Genre not found.']]], 404);
        }
    }
}