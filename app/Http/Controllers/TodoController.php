<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index()
    {
        return view('todos.index');
    }

    public function Create()
    {
        return view('todos.create');
    }

    public function Store(TodoRequest $request)
    {
        $request->validated();

        Todo::created([
            'title' => $request->name,
            'description' => $request->description
        ]);

        $request->session()->flash('alert-success', 'Todo Created Sucessfully');

        return to_route('todos.index');
    }


}
