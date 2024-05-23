<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
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
        return $request->all();
    }


}
