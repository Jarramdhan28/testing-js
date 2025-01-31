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

        return view('article', compact('articles'));
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
}
