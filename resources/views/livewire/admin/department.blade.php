<div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Department Management</h2>

    @if (session()->has('message'))
    <div class="mb-4 px-4 py-2 text-green-700 bg-green-100 rounded-md dark:bg-green-900 dark:text-green-200">
        {{ session('message') }}
    </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Department Name</label>
            <input type="text" wire:model.defer="name"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-end">
            <flux:button variant="primary" icon="plus" size="sm" wire:loading.attr="disabled" type="submit"
                wire:target="save">
                {{ $isEdit ? 'Update Department' : 'Add Department' }}
            </flux:button>
        </div>
    </form>

    <!-- Search -->
    <input type="text" wire:model.debounce.500ms="search" placeholder="Search departments..."
        class="w-full p-2 mb-4 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-4 py-2">{{ $department->name }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <flux:button variant="primary" icon="pencil-square" size="xs"
                            wire:click="edit({{ $department->id }})" wire:target="edit" wire:loading.attr="disabled"
                            title="Edit Department">
                        </flux:button>

                        <flux:button variant="danger" icon="trash" size="xs" wire:click="delete({{ $department->id }})"
                            wire:target="delete" wire:loading.attr="disabled"
                            onclick="return confirm('Are you sure you want to delete this department?')">
                        </flux:button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-4 py-3 text-center text-gray-500">No departments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($departments->hasPages())
    <div class="mt-4">
        {{ $departments->links() }}
    </div>
    @endif
</div>
