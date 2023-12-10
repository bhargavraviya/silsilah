<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;

class UserMarriageController extends Controller
{
    public function index(User $user)
    {
        $marriages = $user->marriages()->with('husband', 'wife')
            ->withCount('childs')->get();

        return view('users.marriages', compact('user', 'marriages'));
    }
}
