<x-layouts.user :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Welcome Registration') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:staff.dashboard>
</x-layouts.user>
