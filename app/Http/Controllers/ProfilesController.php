<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'profileUser' => $user,
            'threads' => $user->threads()->paginate(30)
        ]);
    }
}