<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Todo') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <div class="w-8/12 bg-transparent p-6 rounded-lg">
                            <form action="{{ route('todo.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-white-800 font-bold mb-2">Title:</label>
                                    <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 text-black">
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-white-800 font-bold mb-2">Description:</label>
                                    <textarea name="description" id="description" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 text-black"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="priority" class="block text-white-800 font-bold mb-2">Priority:</label>
                                    <select name="priority" id="priority" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 text-black">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="due_date" class="block text-white-800 font-bold mb-2">Due Date:</label>
                                    <input type="date" name="due_date" 
                                    id="due_date" 
                                    class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none 
                                    focus:border-blue-500 text-black" min="<?php echo date('Y-m-d'); ?>">
                                </div>


                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:bg-blue-700">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('after-script')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
    @endpush
</x-app-layout>