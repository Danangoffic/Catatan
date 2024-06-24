<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <div class="flex justify-end mb-4 ">
            <button type="button"
            data-modal-target="modal-create-todo" data-modal-toggle="modal-create-todo"
            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:bg-green-700">Create Todo</button>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <div class="w-full p-6 rounded-lg">
                            <table class="w-full table-auto border-collapse border border-slate-500">
                                <thead>
                                    <tr>
                                        <th class="border border-slate-600"></th>
                                        <th class="border border-slate-600">Title</th>
                                        <th class="border border-slate-600">Description</th>
                                        <th class="border border-slate-600">Due Date</th>
                                        <th class="border border-slate-600">Status</th>
                                        <th class="border border-slate-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @forelse($todos as $todo)
                                    <tr>
                                        <td class="border border-slate-600 px-2">
                                            <input id="inline-checkbox" type="checkbox" value="1" 
                                            @if($todo->completed) checked @endif 
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                                            focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 
                                            dark:bg-gray-700 dark:border-gray-600">
                                        </td>
                                        <td class="border border-slate-600 px-2 <?php if($todo->completed) {echo 'line-through';} ?> ">{{$todo->title}}</td>
                                        <td class="border border-slate-600 px-2">{!! $todo->description !!}</td>
                                        <td class="border border-slate-600 px-2">
                                            <input type="date" name="due_date" value="{{$todo->due_date}}" id="due_date" 
                                            class="border-0 w-full bg-transparent text-white"
                                            >
                                        </td>
                                        <td class="border border-slate-600 text-center">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            @if($todo->completed)
                                                Done
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <td class="border border-slate-600 text-center">
                                            <a href="{{route('todo.edit', $todo->id)}}" class="inline-flex items-center rounded-md bg-green-50 px-2 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Edit</a>

                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('todos.modal-create')
</x-app-layout>
