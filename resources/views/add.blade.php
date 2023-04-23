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
                        Add Task
                    </h1>

                </div>

                <div class=" bg-opacity-25 p-6 lg:p-8">
                    <form action="/task" method="POST">
                        @csrf

                        <div class="mb-4">
                            Название
                            <input name="name" type="text">
                        </div>
                        <div>
                            Описание
                            <input name="description" type="text">
                        </div>
                        <button type="submit" class="rounded-lg p-2 mt-4" style="margin-left: 120px; background-color: rgb(249 115 22);">Создать</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
