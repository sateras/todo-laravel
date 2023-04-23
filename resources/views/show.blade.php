<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex lg:p-8 border-b border-gray-200">

                    <h1 class="text-2xl font-medium text-gray-900">
                        Task: {{ $task -> id }}
                    </h1>

                </div>

                <div class=" bg-opacity-25 p-6 lg:p-8">
                    <div class="mb-4">
                        Название: {{ $task -> name }}
                    </div>
                    <div>
                        Описание: {{ $task -> description }}
                    </div>
                    <a href="/task/{{ $task->id }}/edit">
                        <button class="rounded-lg p-2 mt-4" style="margin-left: 60px; background-color: rgb(249 115 22);">Изменить</button>
                    </a>
                    <form action="/task/{{$task->id}}/update">
                                
                        <button type="submit" name="delete" formmethod="POST" class=" hover:bg-red-600 bg-red-500 rounded-lg p-2 ml-2">
                            Удалить
                        </button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
