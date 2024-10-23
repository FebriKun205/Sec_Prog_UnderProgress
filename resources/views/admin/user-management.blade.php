<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- User Management System -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-200">Users</h3>
                    {{-- <a href="{{ route('users.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg"> --}}
                    <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg">
                        Add New User
                    </a>
                </div>

                <!-- Table for displaying users -->
                <table class="min-w-full bg-gray-800 text-gray-200 rounded-lg">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-700 text-left">Name</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-left">Email</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-left">Role</th>
                            <th class="px-6 py-3 border-b border-gray-700 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example user rows -->
                        <tr class="bg-gray-800">
                            <td class="px-6 py-4 border-b border-gray-700">John Doe</td>
                            <td class="px-6 py-4 border-b border-gray-700">john@example.com</td>
                            <td class="px-6 py-4 border-b border-gray-700">Admin</td>
                            <td class="px-6 py-4 border-b border-gray-700 text-center">
                                <div class="flex justify-center space-x-4">
                                    {{-- <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-white rounded-lg"> --}}
                                    <a href="#" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-white rounded-lg inline-flex items-center justify-center">
                                        Edit
                                    </a>
                                    {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block"> --}}
                                    <form action="#" method="POST" class="inline-block">
                                        {{-- @csrf --}}
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg inline-flex items-center justify-center">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-800">
                            <td class="px-6 py-4 border-b border-gray-700">Jane Smith</td>
                            <td class="px-6 py-4 border-b border-gray-700">jane@example.com</td>
                            <td class="px-6 py-4 border-b border-gray-700">User</td>
                            <td class="px-6 py-4 border-b border-gray-700 text-center">
                                <div class="flex justify-center space-x-4">
                                    <a href="#" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-white rounded-lg inline-flex items-center justify-center">
                                        Edit
                                    </a>
                                    <form action="#" method="POST" class="inline-block">
                                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg inline-flex items-center justify-center">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{-- {{ $users->links() }} --}}
                    Pagination Links
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
