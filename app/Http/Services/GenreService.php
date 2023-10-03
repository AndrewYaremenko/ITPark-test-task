<?php

namespace App\Http\Services;

use App\Models\Genre;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;

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

    public function getGenre(Genre $genre)
    {
        return new GenreResource($genre);
    }

    public function updateGenre(GenreRequest $request, Genre $genre)
    {
        $validatedData = $request->validated();

        $genre->update($validatedData);

        return new GenreResource($genre);
    }

    public function destroyGenre(Genre $genre)
    {
        $genre->delete();

        return response()->json(['message' => 'Genre deleted!'], 200);
    }
}