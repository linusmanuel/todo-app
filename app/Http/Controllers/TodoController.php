<?php

namespace App\Http\Controllers;

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

    public function Store(Request $request)
    {
        return $request->all();
    }


}
