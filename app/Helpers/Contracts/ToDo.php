<?php

namespace App\Helpers\Contracts;

use Illuminate\Http\Request;

interface ToDo
{

	public function addTask(Request $request);

	public function getTasks();

}