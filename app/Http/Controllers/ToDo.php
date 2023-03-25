<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDo extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        dd($user->id);
    }
}
