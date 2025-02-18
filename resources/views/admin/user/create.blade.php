<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Add User</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    User Details
                </p>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="mb-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-black font-bold">Name</label>
                            <input type="text" id="name" value="{{ old('name') }}" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            @error('name')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-black font-bold">Email</label>
                            <input type="email" id="email" value="{{ old('email') }}" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            @error('email')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="password" class="block mb-2 text-sm font-medium text-black font-bold">Password</label>
                            <input type="password" id="password" value="{{ old('password') }}" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            @error('password')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-black font-bold">Password Confirmation</label>
                            <input type="password" id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            @error('password_confirmation')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="role_id" class="block mb-2 text-sm font-medium text-black font-bold">Role</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="role_id" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Add User</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>