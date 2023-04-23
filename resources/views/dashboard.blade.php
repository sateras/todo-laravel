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
                        ToDO's
                    </h1>
                    <a href="{{ route('add') }}">
                        <button class="rounded-lg p-2 ml-2" style="background-color: rgb(200, 123, 255)">Создать</button>
                    </a>

                </div>

                <div class="bg-opacity-25 p-6 lg:p-8">
                    @if (count($tasks) < 1)
                        База данных с Тудушками пустая
                        
                    @endif
                    @foreach ($tasks as $task)
                        <div class="mb-1 flex border justify-between">
                            <div>
                                {{ $task->name }}
                            </div>
                            <div class="flex">
                                <a href="task/{{$task->id}}">
                                    <button style="background-color: rgb(249 115 22);"
                                        class=" hover:bg-green-500 bg-yellow-500 rounded-lg p-2 ml-2">
                                        Подробнее
                                    </button> 
                                </a>
                                <form action="/task/{{$task->id}}/update">
                                
                                    <button type="submit" name="delete" formmethod="POST" class=" hover:bg-red-600 bg-red-500 rounded-lg p-2 ml-2">
                                        Удалить
                                    </button>
                                    {{ csrf_field() }}
                                </form>
                                
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
