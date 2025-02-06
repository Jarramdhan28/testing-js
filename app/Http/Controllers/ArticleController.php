<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $articles = Article::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")->orWhereHas('user', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            });
        })->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('components.search-results', ['items' => $articles, 'type' => 'articles'])->render(),
                'pagination' => $articles->links()->render(),
            ]);
        }

        $users = User::all();

        return view('article', compact('articles', 'users'));
    }

    public function viewSearch()
    {
        return view('select-live');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Ambil user berdasarkan pencarian
        $users = User::where('name', 'like', "%$query%")
        ->orWhere('email', 'like', "%$query%")
        ->limit(10)
            ->get();

        return response()->json($users);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $article = Article::findOrFail($id);
        $article->user_id = $request->user_id;
        $article->save();

        return response()->json(['message' => 'User berhasil diperbarui!']);
    }
}
