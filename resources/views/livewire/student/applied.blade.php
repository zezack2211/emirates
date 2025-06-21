<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">My Application Details</h1>


    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <!-- Application Summary -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-medium text-gray-900">Application Summary</h2>
        </div>
        <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Application ID</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->id }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Application Date</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->created_at->format('M d, Y h:i A') }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Program</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->program->name ?? 'N/A' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Department</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->program->department->name ?? 'N/A' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Current Status</h3>
                <p class="mt-1 text-sm text-gray-900">
                    @if($statusHistory->first())
                    <span @class([ 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium'
                        , 'bg-yellow-100 text-yellow-800'=> $statusHistory->first()->status === 'pending',
                        'bg-blue-100 text-blue-800' => $statusHistory->first()->status === 'under_review',
                        'bg-green-100 text-green-800' => $statusHistory->first()->status === 'approved',
                        'bg-red-100 text-red-800' => $statusHistory->first()->status === 'rejected',
                        'bg-gray-100 text-gray-800' => !in_array($statusHistory->first()->status, ['pending',
                        'under_review', 'approved', 'rejected'])
                        ])>
                        {{ ucfirst(str_replace('_', ' ', $statusHistory->first()->status->value)) }}
                    </span>
                    @else
                    <span class="text-gray-500">No status available</span>
                    @endif
                </p>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="px-6 py-4 border-t border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Personal Information</h2>
        </div>
        <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Full Name</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->name }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Email</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->email }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Phone Number</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->phone }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Date of Birth</h3>
                <p class="mt-1 text-sm text-gray-900">
                    {{ $application->date_of_birth }}
                </p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-sm font-medium text-gray-500">Address</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->address }}</p>
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="px-6 py-4 border-t border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Relative Contact</h2>
        </div>
        <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Relative Name</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->realtive_name }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Relative Phone</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $application->relative_phone }}</p>
            </div>
        </div>
    </div>

    <!-- Status History -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-medium text-gray-900">Status History</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($statusHistory as $status)
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span @class([ 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium'
                            , 'bg-yellow-100 text-yellow-800'=> $status->status === 'pending',
                            'bg-blue-100 text-blue-800' => $status->status === 'under_review',
                            'bg-green-100 text-green-800' => $status->status === 'approved',
                            'bg-red-100 text-red-800' => $status->status === 'rejected',
                            'bg-gray-100 text-gray-800' => !in_array($status->status, ['pending', 'under_review',
                            'approved', 'rejected'])
                            ])>
                            {{ ucfirst(str_replace('_', ' ', $statusHistory->first()->status->value)) }} </span>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $status->created_at->format('M d, Y h:i A') }}
                    </div>
                </div>
                @if($status->note)
                <div class="mt-2 text-sm text-gray-600">
                    <p>{{ $status->note }}</p>
                </div>
                @endif
            </div>
            @empty
            <div class="px-6 py-4 text-center text-gray-500">
                No status history available
            </div>
            @endforelse
        </div>
    </div>

    <!-- Documents -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-medium text-gray-900">Submitted Documents</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($documents as $document)
            <div class="px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Passport Photo</h3>
                        <div class="mt-1">
                            <a href="{{ asset('storage/'.$document->photo) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm">
                                View Document
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Certificate</h3>
                        <div class="mt-1">
                            <a href="{{ asset('storage/'.$document->certificate) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm">
                                View Document
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">ID Card</h3>
                        <div class="mt-1">
                            <a href="{{ asset('storage/'.$document->national_id) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm">
                                View Document
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-6 py-4 text-center text-gray-500">
                No documents submitted
            </div>
            @endforelse
        </div>
    </div>

    <!-- Notes -->
    @if($notes->isNotEmpty())
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-medium text-gray-900">Administrator Notes</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($notes as $note)
            <div class="px-6 py-4">
                <div class="flex justify-between items-start">
                    <div class="text-sm text-gray-600">
                        <p>{{ $note->name }}</p>
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ $note->created_at->format('M d, Y h:i A') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>