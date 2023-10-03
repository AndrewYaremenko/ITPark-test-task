<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\GenreRequest;
use App\Http\Services\GenreService;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $genresResource = $this->genreService->getGenres();

        return $genresResource;
    }

    public function store(GenreRequest $request)
    {
        $genreResource = $this->genreService->saveGenre($request);

        return $genreResource;
    }

    public function show(Genre $genre)
    {
        $genreResource = $this->genreService->getGenre($genre);

        return $genreResource;
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $filmResource = $this->genreService->updateGenre($request, $genre);

        return $filmResource;
    }

    public function destroy(Genre $genre)
    {
        $response = $this->genreService->destroyGenre($genre);

        return $response;
    }
}