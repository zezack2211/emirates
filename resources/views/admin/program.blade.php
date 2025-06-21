<x-layouts.admin :title="__('Programs Management')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Programs Management') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <livewire:admin.program />

    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('programDeleted', () => {
                    alert('Program has been deleted successfully.');
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
