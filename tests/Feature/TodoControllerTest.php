<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;
use App\Models\User;

class TodoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_todo_index_displays_todos()
    {
        $user = User::factory()->create();  // Cria um usuário fictício
        $this->actingAs($user);  // Autentica o usuário

        $todos = Todo::factory()->count(3)->create();

        $response = $this->get(route('todos.index'));

        $response->assertStatus(200);
        $response->assertViewIs('todos.index');
        $response->assertViewHas('todos', $todos);
    }

    public function test_todo_create_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('todos.create'));

        $response->assertStatus(200);
        $response->assertViewIs('todos.create');
    }

    public function test_todo_can_be_stored()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title' => 'Test Todo',
            'description' => 'This is a test description'
        ];

        $response = $this->post(route('todos.store'), $data);

        $response->assertRedirect(route('todos.index'));
        $this->assertDatabaseHas('todos', $data);
    }

    public function test_todo_show_displays_todo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = Todo::factory()->create();

        $response = $this->get(route('todos.show', $todo->id));

        $response->assertStatus(200);
        $response->assertViewIs('todos.show');
        $response->assertViewHas('todo', $todo);
    }

    public function test_todo_edit_displays_edit_form()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = Todo::factory()->create();

        $response = $this->get(route('todos.edit', $todo->id));

        $response->assertStatus(200);
        $response->assertViewIs('todos.edit');
        $response->assertViewHas('todo', $todo);
    }
}
