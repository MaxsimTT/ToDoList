<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\Contracts\ToDo;

class ToDoEloquentOrm implements ToDo
{
	public function addTask(Request $request)
	{
		dd(123);
	}

	public function getToDoList(int $items, string $sort = 'desc')
	{
		$user = User::find(Auth::id());

		switch ($sort) {
			case 'asc':
				return $user->tasks()->oldest()->paginate($items);
				break;
			
			default:
				return $user->tasks()->latest()->paginate($items);
				break;
		}
	}
}