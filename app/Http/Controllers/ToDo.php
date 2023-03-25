<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\Contracts\ToDo as Obj;

class ToDo extends Controller
{
    public function show(Request $request, Obj $toDo)
    {
        $tasks = $toDo->getTasks();

        dd($tasks);
    }
}
