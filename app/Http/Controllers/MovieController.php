<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request, TMDBService $tmdbService)
    {
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $movies = $tmdbService->searchMovies($searchQuery);
        } else {
            $movies = $tmdbService->getPopularMovies();
        }

        return response()->json($movies);
    }
}