<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserLookupController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = collect();

        if ($query) {
            $users = User::query()
                ->where('name', 'like', "%{$query}%")
                ->get();
        }

        return view('users.search', compact('users', 'query'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
