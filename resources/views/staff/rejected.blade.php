<x-layouts.user :title="__('Applications Rejected')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ auth()->user()->name }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Application Thats Rejected') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:staff.reaject />


</x-layouts.user>
