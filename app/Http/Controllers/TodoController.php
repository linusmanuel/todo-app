<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of all Todo items.
     *
     * This function retrieves all Todo items from the database and passes them
     * to the 'todos.index' view for rendering.
     *
     * @return \Illuminate\View\View The view displaying the list of all Todo items.
     */
    public function index()
    {
        $todos = Todo::all();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new Todo item.
     *
     * This function returns the 'todos.create' view which contains
     * the form for creating a new Todo item.
     *
     * @return \Illuminate\View\View The view containing the form to create a new Todo item.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created todo item in storage.
     *
     * This method validates the incoming request, creates a new todo item with
     * the provided data, flashes a success message to the session, and redirects
     * the user to the index page of todo items.
     *
     * @param \App\Http\Requests\TodoRequest $request The incoming request containing the data for the new todo item.
     * @return \Illuminate\Http\RedirectResponse Redirects to the index page of todo items.
     */
    public function store(TodoRequest $request)
    {
        $request->validated();

        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $request->session()->flash('alert-success', 'Tarefa criada com sucesso');

        return to_route('todos.index');
    }

    /**
     * Display the specified todo item.
     *
     * This method retrieves a todo item by its ID. If the item is not found, it flashes an error message
     * to the session, redirects the user to the index page with an error message, and returns the view
     * for displaying the todo item if found.
     *
     * @param int $id The ID of the todo item to display.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Redirects to the index page with an error message if the item is not found, or returns the view to display the item.
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Não foi possível encontrar a tarefa');
            return to_route('todos.index')->withErrors([
                'error' => 'Não foi possível encontrar a tarefa'
            ]);
        }
        return view('todos.show', compact('todo'));
    }


    /**
     * Show the form for editing the specified todo item.
     *
     * This method retrieves a todo item by its ID. If the item is not found, it flashes an error message
     * to the session, redirects the user to the index page with an error message, and returns the view
     * for editing the todo item if found.
     *
     * @param int $id The ID of the todo item to edit.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Redirects to the index page with an error message if the item is not found, or returns the view to edit the item.
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Não foi possível encontrar a tarefa');
            return to_route('todos.index')->withErrors([
                'error' => 'Não foi possível encontrar a tarefa'
            ]);
        }
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified todo item in storage.
     *
     * This method retrieves a todo item by its ID from the request, updates it with the provided data,
     * flashes a success message to the session, and redirects the user to the index page. If the item
     * is not found, it flashes an error message to the session and redirects with an error.
     *
     * @param \Illuminate\Http\Request $request The incoming request containing the data for updating the todo item.
     * @return \Illuminate\Http\RedirectResponse Redirects to the index page with a success message if the update is successful, or with an error message if the item is not found.
     */
    public function update(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            request()->session()->flash('error', 'Não foi possível encontrar a tarefa');
            return to_route('todos.index')->withErrors([
                'error' => 'Não foi possível encontrar a tarefa'
            ]);
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed,
        ]);

        $request->session()->flash('alert-info', 'Tarefa atualizada com sucesso');

        return to_route('todos.index');
    }

    /**
     * Update the specified todo item in storage.
     *
     * This method retrieves a todo item by its ID from the request, updates it with the provided data,
     * flashes a success message to the session, and redirects the user to the index page. If the item
     * is not found, it flashes an error message to the session and redirects with an error.
     *
     * @param \Illuminate\Http\Request $request The incoming request containing the data for updating the todo item.
     * @return \Illuminate\Http\RedirectResponse Redirects to the index page with a success message if the update is successful, or with an error message if the item is not found.
     */
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            request()->session()->flash('error', 'Não foi possível encontrar a tarefa');
            return to_route('todos.index')->withErrors([
                'error' => 'Não foi possível encontrar a tarefa'
            ]);
        }

        $todo->delete();
        $request->session()->flash('alert-info', 'Tarefa deletada com sucesso');

        return to_route('todos.index');
    }
}
