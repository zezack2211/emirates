<div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md">

    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Program Management</h2>

    @if (session()->has('message'))
    <div class="mb-4 px-4 py-2 text-green-700 bg-green-100 rounded-md dark:bg-green-900 dark:text-green-200">
        {{ session('message') }}
    </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Program Name</label>
            <input type="text" wire:model.defer="name"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Department</label>
            <select wire:model.defer="department_id"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-end col-span-2">
            <flux:button type="submit" variant="primary" icon="plus" size="sm" wire:loading.attr="disabled"
                wire:target="save">
                {{ $isEdit ? 'Update Program' : 'Add Program' }}
            </flux:button>
        </div>
    </form>

    <!-- Search -->
    <input type="text" wire:model.debounce.500ms="search" placeholder="Search programs..."
        class="w-full p-2 mb-4 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase">
                <tr>
                    <th class="px-4 py-2">Program</th>
                    <th class="px-4 py-2">Department</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($programs as $program)
                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-4 py-2">{{ $program->name }}</td>
                    <td class="px-4 py-2">{{ $program->department->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 text-center">
                        <flux:button variant="primary" icon="pencil-square" size="xs" wire:loading.attr="disabled"
                            wire:target="edit({{ $program->id }})" wire:click="edit({{ $program->id }})">
                        </flux:button>
                        <flux:button variant="danger" size="xs" wire:loading.attr="disabled" icon="trash"
                            wire:click="delete({{ $program->id }})" onclick="return confirm('Are you sure?')"
                            class="text-red-600 hover:underline text-sm mx-1">
                        </flux:button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-3 text-center text-gray-500">No programs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($programs->hasPages())
    <div class="mt-4">
        {{ $programs->links() }}
    </div>
    @endif
</div>
