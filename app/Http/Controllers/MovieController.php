<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        // Faz um GET na API do TMDB enviando o Token de autorização
        $response = Http::withToken(env('TMDB_TOKEN'))
            ->get(env('TMDB_BASE_URL') . '/movie/popular', [
                'language' => 'pt-BR', // Traz os textos em português
                'page' => 1,
            ]);

        // Retorna o resultado direto na tela (em JSON) para testarmos
        return $response->json();
    }
}