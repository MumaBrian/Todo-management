<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black font-bold pb-6">Show Task</h1>

            <div class="w-full mt-4">
                <p class="text-3xl pb-3 font-bold flex items-center">
                    Task Details
                </p>

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Title</label>
                        <span class="text-gray-500">{{ $task->title }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="due_date" class="block mb-2 text-sm font-medium text-black font-bold">Due Date</label>
                        <span class="text-gray-500">{{ $task->due_date }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Is Completed</label>
                        <span class="text-gray-500">{{ $task->completed ? "Yes" : "No" }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Completed Date</label>
                        <span class="text-gray-500">{{ $task->completed_at ?? "None" }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="Category" class="block mb-2 text-sm font-medium text-black font-bold">Category</label>
                        <span class="text-gray-500">{{ $task->category->name }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="assignedUser" class="block mb-2 text-sm font-medium text-black font-bold">Assigned to</label>
                        <span class="text-gray-500">{{ $task->user->name }}</span>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Created By</label>
                        <span class="text-gray-500">{{ $task->user->name }}</span>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium text-black font-bold" for="description">Description</label>
                    <span class="text-gray-500">{{ $task->description }}</span>
                </div>

                @if (!$task->completed)
                    <form type="submit" method="POST" style="display: inline"
                        action="{{ route('admin.complete_task.store', $task->id) }}"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                            type="submit">Mark Completed</button>
                    </form>
                @endif

            </div>
        </main>
    </div>
</x-admin-layout>