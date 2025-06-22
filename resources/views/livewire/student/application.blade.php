<div class="max-w-4xl mx-auto p-6">
    <flux:heading text="University Application Form" />

    @if ($hasSubmitted)
    <div class="bg-blue-100 text-blue-800 p-4 rounded shadow">
        You have already submitted your application.
        Please check your application status from the sidebar.
    </div>
    @else
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <!-- Full Name -->
        @csrf
        <flux:input label="Full Name" type="text" wire:model.defer="name" />
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Email -->
        <flux:input label="Email" type="email" wire:model.defer="email" />
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Phone -->
        <flux:input label="Phone" type="text" wire:model.defer="phone" />
        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Address -->
        <flux:input label="Address" type="text" wire:model.defer="address" />
        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Date of Birth -->
        <flux:input label="Date of Birth" type="date" wire:model.defer="date_of_birth" />
        @error('date_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Program -->
        <flux:select label="Program" wire:model.defer="program_id">
            <option value="">Select Program</option>
            @foreach ($programs as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </flux:select>
        @error('program_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Relative Name -->
        <flux:input label="Relative Name" type="text" wire:model.defer="realtive_name" />
        @error('realtive_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Relative Phone -->
        <flux:input label="Relative Phone" type="text" wire:model.defer="relative_phone" />
        @error('relative_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Certificate Upload -->
        <flux:input label="Certificate" type="file" wire:model="certificate" />
        @error('certificate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- ID Card Upload -->
        <flux:input label="ID Card" type="file" wire:model="identity_card" />
        @error('identity_card') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Personal Photo Upload -->
        <flux:input label="Personal Photo" type="file" wire:model="photo" />
        @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Submit Button -->
        <div class="md:col-span-2 mt-6">
            <flux:button type="submit" variant="primary" icon="plus">
                Submit Application
            </flux:button>
        </div>
    </form>

    @if (session()->has('message'))
    <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('message') }}
    </div>
    @endif
    @endif
</div>
