<x-app-layout>
    <div class="container">
        <a href="{{ route('todos.index')}}">
            <i class="fa-solid fa-tent-arrow-turn-left pb-4" style="color: #ffffff;"></i>
        </a>
        <div class="">
            @if ($errors->any())
            <div class="alert alert-danger" data-message>
                <ul class="text-red-300 font-weight-bold pb-4">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="{{ route('todos.store') }}" class="form">
                @csrf
                <div class="form__group">
                    <input type="text" class="form__input" name="title" placeholder="Informe o nome da tarefa">
                </div>
                <div class="form__group">
                    <textarea class="form__textarea" name="description" cols="5" rows="5" placeholder="Escreva a descrição"></textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn--primary-o">
                        <i class="fa-solid fa-heart-circle-plus"></i>
                        Criar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
