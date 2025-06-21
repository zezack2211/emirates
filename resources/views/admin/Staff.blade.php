<x-layouts.admin :title="__('Registration Management')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Registration Management') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>


    <livewire:admin.staff-manager />


    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('studentDeleted', () => {
                    alert('Registration has been deleted successfully.');
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
