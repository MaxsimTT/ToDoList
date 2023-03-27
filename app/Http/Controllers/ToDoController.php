<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ToDo;
use App\Helpers\Contracts\ToDo as ContractToDo;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContractToDo $obj)
    {
        
        $to_do_list = $obj->getToDoList(50);

        return view('todo.index',compact('to_do_list'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
        ]);

        $data = [
            'task' => $request->task,
            'user_id' => Auth::id(), 
        ];
        ToDo::create($data);
       
        return redirect()->route('todo.index')
                        ->with('success','Task created successfully.');
    }
}
