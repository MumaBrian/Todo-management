<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Users</h1>

            <x-session-message />

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    Users Records
                </p>
                <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                onclick="location.href='{{ route('admin.users.create') }}';">Add User</button>
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Role</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->id }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->role->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                    type="button"
                                    onclick="location.href='{{ route('admin.users.edit', $user->id) }}';">Edit</button>
                                    <form type="submit" method="POST" style="display: inline" action="{{ route('admin.users.destroy', $user->id)}}" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {!! $users->links() !!}
        </main>
    </div>
</x-admin-layout>

