<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Contracts\ToDo;

class ToDoEloquentOrm implements ToDo
{
	public function addTask(Request $request)
	{
		dd(123);
	}

	public function getTasks()
	{
		$user = Auth::user();
		return $user->tasks;
	}
}