<x-layouts.admin :title="__('Settings')">


    <livewire:settings.appearance />


    <section class="w-full max-w-3xl mt-10">
        <livewire:settings.profile />

        <section class="w-full max-w-3xl mt-10">
            <livewire:settings.password>
        </section>
</x-layouts.admin>