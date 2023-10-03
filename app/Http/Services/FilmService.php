<?php

namespace App\Http\Services;

use App\Models\Film;
use App\Http\Requests\FilmRequest;
use App\Http\Resources\FilmResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

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

            if ($request->hasFile('poster')) {
                $file = $request->file('poster');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/posters', $filename);
                $validatedData['poster_link'] = $filename;
            }
    
            $film = Film::create($validatedData);
    
            if (isset($validatedData['genres'])) {
                $film->genres()->sync($validatedData['genres']);
            }
    
            return (new FilmResource($film))
                ->response()
                ->setStatusCode(201);
    }

    public function getFilm($filmId)
    {
        try {
            $film = Film::findOrFail($filmId);
            return new FilmResource($film);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["film" => ['Film not found.']]], 404);
        }
    }

    public function updateFilm(FilmRequest $request, $filmId)
    {
        try {
            $validatedData = $request->validated();
            $film = Film::findOrFail($filmId);

            if ($request->hasFile('poster')) {

                if ($film->poster_link) {
                    Storage::delete('public/posters/' . $film->poster_link);
                }
    
                $file = $request->file('poster');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/posters', $filename);
                $validatedData['poster_link'] = $filename;
            }

            $film->update($validatedData);
            
            return new FilmResource($film);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["film" => ['Film not found.']]], 404);
        }
    }

    public function destroyFilm($filmId)
    {
        try {
            $film = Film::findOrFail($filmId);
            $film->delete();
            return response()->json(['message' => 'Film deleted!'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['errors' => ["film" => ['Film not found.']]], 404);
        }
    }
}