<x-app-layout>
    <div class="container">
        <a href="{{ route('todos.index')}}">
            <i class="fa-solid fa-tent-arrow-turn-left pb-4" style="color: #ffffff;"></i>
        </a>
        <form method="post" action="{{ route('todos.update') }}" class="form">
            @csrf
            @method('PUT')
            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
            <div class="form__group">
                <input type="text" class="form__input" name="title" value="{{ $todo->title }}">
            </div>
            <div class=" form__group">
                <textarea class="form__textarea" name="description" cols="5" rows="5">
                {{ $todo->description }}
                </textarea>
            </div>

            <div class="pb-12">
                <select name="is_completed" class="rounded-md text-gray-500">
                    <option disabled selected>Atualizar Status</option>
                    <option value="1">Completo</option>
                    <option value="0">Incompleto</option>
                </select>
            </div>
            <div class="">
                <button type="submit" class="btn--primary-o">
                    <i class="fa-solid fa-heart-circle-plus text-[#fac608]"></i>
                    Atualizar
                </button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
