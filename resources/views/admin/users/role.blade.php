<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <!-- Link to User Index Page -->
                <div class="flex p-2 justify-end">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Users Index</a>
                </div>

                <!-- User Details -->
                <div class="flex flex-col p-2 bg-slate-100">
                    <div>User Name: {{ $user->name }}</div>
                    <div>User Email: {{ $user->email }}</div>
                </div>

                <!-- Roles -->
                <div class="mt-6 p-2 bg-slate-100">

                    <!-- Assigned Roles Heading -->
                    <h2 class="text-2xl font-semibold">Assigned Roles</h2>

                    <!-- Assigned Roles (click to remove) -->
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" onsubmit="return confirm('Are you sure?');">

                                    <!-- Tokens -->
                                    @csrf
                                    @method('DELETE')

                                    <!-- Remove Role -->
                                    <button type="submit">{{ $user_role->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <!-- All Roles -->
                    <div class="max-w-xl mt-6">

                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">

                            <!-- Tokens -->
                            @csrf

                            <!-- Drop-down Menu -->
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Error Messages -->
                            @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror

                            <!-- Assign Role to User -->
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Permissions -->
                <div class="mt-6 p-2 bg-slate-100">

                    <!-- Assigned Permissions Heading -->
                    <h2 class="text-2xl font-semibold">Assigned Permissions</h2>

                    <!-- Assigned Permissions (click to remove) -->
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                                    <!-- Tokens -->
                                    @csrf
                                    @method('DELETE')

                                    <!-- Remove Permission -->
                                    <button type="submit">{{ $user_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <!-- All Permissions -->
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">

                            <!-- Tokens -->
                            @csrf

                            <!-- Drop-down Menu -->
                            <div class="sm:col-span-6">
                                <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Error Messages -->
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror

                            <!-- Assign Permission to User -->
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-admin-layout>
