<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDBService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = env('TMDB_BASE_URL');
        $this->token = env('TMDB_TOKEN');
    }

    public function getPopularMovies($page = 1)
    {
        return Http::withToken($this->token)
            ->get("{$this->baseUrl}/movie/popular", [
                'language' => 'pt-BR',
                'page' => $page,
            ])->json();
    }
}