<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit Category</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center font-bold">
                    Category Details
                </p>
                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="mb-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Category Name</label>
                            <input type="text" id="name" value="{{ $category->name }}" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="ex: Laravel" required>
                            @error('name')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded">Update Category</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>