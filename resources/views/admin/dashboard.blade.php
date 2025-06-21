<x-layouts.admin :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>

        <flux:subheading size="lg" class="mb-6">{{ __('Welcome Admin') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:admin.dashboard />
    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('dashboardUpdated', () => {
                    alert('Dashboard has been updated successfully.');
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
