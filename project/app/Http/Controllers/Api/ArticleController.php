<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(article::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'name' => 'required|string',
            'descreption' => 'required|string'
        ]);

        $article = article::create([

            'name' => $request->name,
            'descreption' => $request->descreption
        ]);

        return response()->json($article, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        return response()->json($article, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $article->update($request->all());
        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $article->delete();
        return response()->json(['message' => 'Utilisateur supprimé'], 200);
    }
}
