<div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Staff Management</h1>

    @if (session()->has('message'))
    <div class="mb-4 px-4 py-3 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-200">
        {{ session('message') }}
    </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="save" class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Name</label>
            <input type="text" wire:model.defer="name"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input type="email" wire:model.defer="email"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Password</label>
            <input type="password" wire:model.defer="password"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-end">
            <flux:button variant="primary" type="submit" icon="plus" wire:loading.attr="disabled" wire:target="save">
                {{ $isEdit ? 'Update Staff' : 'Add Staff' }}
            </flux:button>
        </div>
    </form>

    <!-- Search -->
    <input type="text" wire:model.debounce.500ms="search" placeholder="Search by name or email..."
        class="w-full p-3 mb-4 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffList as $staff)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $staff->name }}</td>
                    <td class="px-4 py-2">{{ $staff->email }}</td>
                    <td class="px-4 py-2 text-center">
                        <flux:button variant="primary" size="xs" wire:click="edit({{ $staff->id }})"
                            icon="pencil-square">
                        </flux:button>
                        <flux:button variant="danger" size="xs" icon="trash" wire:click="delete({{ $staff->id }})"
                            onclick="return confirm('Are you sure you want to delete this staff member?')">
                        </flux:button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No staff members found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($staffList->hasPages())
    <div class="mt-6">
        {{ $staffList->links() }}
    </div>
    @endif
</div>
