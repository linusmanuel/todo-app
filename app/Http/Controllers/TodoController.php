<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index()
    {
        $todos = Todo::all();

        return view('todos.index', compact('todos'));
    }

    public function Create()
    {
        return view('todos.create');
    }

    public function Store(TodoRequest $request)
    {
        $request->validated();

        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $request->session()->flash('alert-success', 'Todo Created Sucessfully');

        return to_route('todos.index');
    }


}
