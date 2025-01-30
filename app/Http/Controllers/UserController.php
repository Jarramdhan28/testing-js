<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $users = User::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")->orWhere('email', 'like', "%{$query}%");
        })->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('components.search-results', ['items' => $users, 'type' => 'users'])->render(),
                'pagination' => $users->links()->render(),
            ]);
        }

        return view('user', compact('users'));
    }
}


