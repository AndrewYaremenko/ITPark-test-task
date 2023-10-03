<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Requests\FilmRequest;
use App\Http\Services\FilmService;

class FilmController extends Controller
{
    protected $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index()
    {
        $filmsResource = $this->filmService->getFilms();

        return $filmsResource;
    }

    public function store(FilmRequest $request)
    {
        $filmResource = $this->filmService->saveFilm($request);

        return $filmResource;
    }

    public function show(Film $film)
    {
        $filmResource = $this->filmService->getFilm($film);

        return $filmResource;
    }

    public function update(FilmRequest $request, Film $film)
    {
        $filmResource = $this->filmService->updateFilm($request, $film);

        return $filmResource;
    }

    public function destroy(Film $film)
    {
        $response = $this->filmService->destroyFilm($film);

        return $response;
    }
}