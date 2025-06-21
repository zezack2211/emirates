<x-layouts.admin :title="__('Departments Management')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Departments Management') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <livewire:admin.department />

    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('departmentDeleted', () => {
                    alert('Department has been deleted successfully.');
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
