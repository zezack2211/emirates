<div>
    <h1 class="text-2xl font-bold mb-4">Manage Applications</h1>
    <hr class="mb-6 border-gray-300" />

    <!-- Application List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($applications as $application)
        <div class="p-4 bg-white rounded-lg shadow-md border-l-4
            @if($application->status === 'accepted') border-green-500
            @elseif($application->status === 'rejected') border-red-500
            @else border-blue-500 @endif">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-lg font-semibold">{{ $application->user->name }}</h2>
                    <p class="text-sm text-gray-600">{{ $application->user->email }}</p>
                </div>
                <span class="px-2 py-1 text-xs rounded-full
                    @if($application->status === 'accepted') bg-green-100 text-green-800
                    @elseif($application->status === 'rejected') bg-red-100 text-red-800
                    @else bg-blue-100 text-blue-800 @endif">
                    {{ ucfirst($application->status) }}
                </span>
            </div>

            <div class="mt-3">
                <p class="text-sm"><span class="font-medium">Department:</span> {{ $application->department}}
                </p>
                <p class="text-sm"><span class="font-medium">Program:</span> {{ $application->program->name }}</p>
                <p class="text-sm"><span class="font-medium">Applied:</span> {{ $application->created_at->format('M d,
                    Y') }}</p>
                <p class="text-sm"><span class="font-medium">Documents:</span> {{ $application->documents_count }}</p>
            </div>

            <button wire:click="viewApplication({{ $application->id }})"
                class="mt-3 w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                View Details
            </button>
        </div>
        @endforeach
    </div>

    <!-- Application Detail Modal -->
    @if ($selectedApplication)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <!-- Header -->
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold">{{ $selectedApplication->user->name }}'s Application</h3>
                        <p class="text-gray-600">{{ $selectedApplication->program->name }}</p>
                    </div>
                    <button wire:click="resetView" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Status Badge -->
                <div class="mt-4">
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        @if($selectedApplication->status === 'accepted') bg-green-100 text-green-800
                        @elseif($selectedApplication->status === 'rejected') bg-red-100 text-red-800
                        @else bg-blue-100 text-blue-800 @endif">
                        Status: {{ ucfirst($selectedApplication->status) }}
                    </span>
                </div>

                <!-- Applicant Info -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-lg mb-2">Applicant Information</h4>
                        <div class="space-y-2 text-sm">
                            <p><span class="font-medium">Name:</span> {{ $selectedApplication->name }}</p>

                            <p><span class="font-medium">Applied Email:</span> {{ $selectedApplication->email }}</p>

                            <p><span class="font-medium">Phone:</span> {{ $selectedApplication->phone ?? 'Not provided'
                                }}</p>

                            <p><span class="font-medium">Address:</span> {{ $selectedApplication->address }}</p>

                            <p><span class="font-medium">Date Of Birth:</span> {{ $selectedApplication->date_of_birth }}
                            </p>

                            <p><span class="font-medium">Relative Name:</span> {{ $selectedApplication->realtive_name }}
                            </p>

                            <p><span class="font-medium">Relative Phone:</span> {{ $selectedApplication->relative_phone
                                }}</p>

                            <p><span class="font-medium">Applied On:</span> {{
                                $selectedApplication->created_at->format('F j, Y \a\t g:i a') }}</p>
                        </div>

                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-lg mb-2">Program Details</h4>
                        <p><span class="font-medium">Program:</span> {{ $selectedApplication->program->name }}</p>

                    </div>
                </div>

                <!-- Documents Section -->
                <div class="mt-6">
                    <h4 class="font-semibold text-lg mb-2">Submitted Documents</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($selectedApplication->documents as $doc)
                        <div class="border rounded-lg p-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span>Id Brove</span>
                            </div>
                            <a href="{{ asset('storage/' . $doc->national_id) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 hover:underline text-sm">
                                View Document
                            </a>
                        </div>
                        <div class="border rounded-lg p-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span>Personal Photo</span>
                            </div>
                            <a href="{{ asset('storage/' . $doc->photo) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 hover:underline text-sm">
                                View Document
                            </a>
                        </div>
                        <div class="border rounded-lg p-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span>Certificate</span>
                            </div>
                            <a href="{{ asset('storage/' . $doc->certificate) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 hover:underline text-sm">
                                View Document
                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="mt-6">
                    <h4 class="font-semibold text-lg mb-2">Application Notes</h4>
                    <div class="space-y-3 mb-4">
                        @forelse ($selectedApplication->notes as $note)
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <div class="flex justify-between items-start">
                                <p class="font-medium">{{ $note->name }}</p>
                                <span class="text-xs text-gray-500">{{ $note->created_at->format('M j, Y g:i a')
                                    }}</span>
                            </div>
                            <p class="mt-1 text-gray-700">{{ $note->name }}</p>
                        </div>
                        @empty
                        <p class="text-gray-500">No notes yet.</p>
                        @endforelse
                    </div>

                    <!-- Add Note Form -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Add Note</label>
                        <textarea wire:model.defer="noteText"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            rows="3" placeholder="Enter your notes about this application..."></textarea>
                        <button wire:click="sendNote"
                            class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Add Note
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 pt-4 border-t flex justify-end space-x-3">
                    <button wire:click="reject"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                    <button wire:click="approve"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Approve
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>