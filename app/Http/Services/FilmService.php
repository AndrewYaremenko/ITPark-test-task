<?php

namespace App\Http\Services;

use App\Models\Film;
use App\Http\Requests\FilmRequest;
use App\Http\Resources\FilmResource;

class FilmService
{
    public function getFilms()
    {
        $films = Film::with('genres')->paginate(3);

        return FilmResource::collection($films);
    }

    public function saveFilm(FilmRequest $request)
    {
        $validatedData = $request->validated();

        $film = Film::create($validatedData);
        if (isset($validatedData['genres'])) {
            $film->genres()->sync($validatedData['genres']);
        }

        return (new FilmResource($film))
        ->response()
        ->setStatusCode(201);
    }

    public function getFilm(Film $film)
    {
        return new FilmResource($film);
    }

    public function updateFilm(FilmRequest $request, Film $film)
    {
        $validatedData = $request->validated();

        $film->update($validatedData);

        return new FilmResource($film);
    }

    public function destroyFilm(Film $film)
    {
        $film->delete();

        return response()->json(['message' => 'Film deleted!'], 200);
    }
}