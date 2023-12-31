<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\FilmRequest;
use App\Http\Services\FilmService;
use App\Http\Controllers\Controller;

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

    public function show($id)
    {
        $filmResource = $this->filmService->getFilm($id);

        return $filmResource;
    }

    public function publish($id)
    {
        $filmResource = $this->filmService->publishFilm($id);

        return $filmResource;
    }

    public function update(FilmRequest $request, $id)
    {
        $filmResource = $this->filmService->updateFilm($request, $id);

        return $filmResource;
    }

    public function destroy($id)
    {
        $response = $this->filmService->destroyFilm($id);

        return $response;
    }
}