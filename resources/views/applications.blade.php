<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Applications') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Apply to get your sit in the college') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:student.application />
    <x-slot name="scripts">
        <script>
            document.addEventListener('livewire:load', function () {
            Livewire.on('applicationSubmitted', () => {
                alert('Application has been submitted successfully.');
            });
        });
        </script>
    </x-slot>
</x-layouts.app>
