<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\GenreRequest;
use App\Http\Services\GenreService;
use App\Http\Controllers\Controller;

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

    public function show($id)
    {
        $genreResource = $this->genreService->getGenre($id);

        return $genreResource;
    }

    public function update(GenreRequest $request, $id)
    {
        $filmResource = $this->genreService->updateGenre($request, $id);

        return $filmResource;
    }

    public function destroy($id)
    {
        $response = $this->genreService->destroyGenre($id);

        return $response;
    }
}