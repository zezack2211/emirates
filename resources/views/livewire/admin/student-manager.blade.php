<div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Student Management</h2>

    @if (session()->has('message'))
    <div class="mb-4 text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-200 px-4 py-2 rounded-md">
        {{ session('message') }}
    </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" wire:model.defer="name"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" wire:model.defer="email"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300">Password</label>
            <input type="password" wire:model.defer="password"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-end">
            <flux:button variant="primary" type="submit" icon="plus" wire:loading.attr="disabled">
                {{ $isEdit ? 'Update' : 'Add Student' }}
            </flux:button>
        </div>
    </form>

    <!-- Search -->
    <input type="text" wire:model.debounce.500ms="search" placeholder="Search for a student..."
        class="w-full p-2 mb-4 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->email }}</td>
                    <td class="px-4 py-2 text-center">
                        <flux:button variant="primary" icon="pencil-square" size="xs"
                            wire:click="edit({{ $student->id }})" wire:loading.attr="disabled">
                        </flux:button>
                        <flux:button variant="danger" icon="trash" size="xs" wire:click="delete({{ $student->id }})"
                            onclick="return confirm('Are you sure you want to delete this student?')">
                        </flux:button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-3 text-center text-gray-500">No results found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($students->hasPages())
    <div class="mt-4">
        {{ $students->links() }}
    </div>
    @endif
</div>
