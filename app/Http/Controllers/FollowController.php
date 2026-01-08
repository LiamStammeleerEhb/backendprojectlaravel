<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FollowController extends Controller
{
    public function follow(User $user): RedirectResponse
    {
        auth()->user()->following()->syncWithoutDetaching($user->id);

        return back();
    }

    public function unfollow(User $user): RedirectResponse
    {
        auth()->user()->following()->detach($user->id);

        return back();
    }
}
