<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(TMDBService $tmdbService)
    {
        $movies = $tmdbService->getPopularMovies();

        return response()->json($movies);
    }
}