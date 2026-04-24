<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tmdb_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'poster_path' => 'nullable|string',
        ]);

        $favorite = Favorite::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'tmdb_id' => $validated['tmdb_id']
            ],
            [
                'title' => $validated['title'],
                'poster_path' => $validated['poster_path'],
            ]
        );

        return response()->json([
            'message' => 'Filme favoritado com sucesso!',
            'favorite' => $favorite
        ], 201);
    }
}