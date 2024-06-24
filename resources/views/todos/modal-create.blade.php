<!-- Main modal -->

<div id="modal-create-todo" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create Todo
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('todo.store') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div class="col-span-12">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
                        <input type="text" name="title" id="title" placeholder="Input title" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                        dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2 sm:col-span-12">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                        <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Input description"
                        ></textarea>
                    </div>
                    <div class="col-span-2 sm:col-span-12">
                        <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority:</label>
                        <select name="priority" id="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date:</label>
                        <input type="date" name="due_date" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 
                        focus:border-primary-600 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white 
                        dark:focus:ring-primary-500 dark:focus:border-primary-500" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-span-12">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <label class="inline-flex items-center mb-5 cursor-pointer">
                        <input type="checkbox" value="1" class="sr-only peer" name="completed">
                            <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 
                            peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 
                            peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full 
                            peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] 
                            after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 
                            after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 border border-gray-100"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Is Completed?</span>
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5 float-right" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Save
                    </button>
                </div>
                <!-- Modal footer -->
                <!-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div> -->
            </form>
        </div>
    </div>
</div>