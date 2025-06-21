<x-layouts.admin :title="__('Student Management')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Student Management') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <flux:with-container>
        <livewire:admin.student-manager />
    </flux:with-container>

    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('studentDeleted', () => {
                    alert('Student has been deleted successfully.');
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
