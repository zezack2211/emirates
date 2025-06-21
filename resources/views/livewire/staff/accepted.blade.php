<div class="p-6">
    <h1 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Accepted Applications</h1>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700 text-left text-gray-700 dark:text-gray-200">
                <tr>
                    <th class="p-2 border dark:border-gray-700">Id</th>
                    <th class="p-2 border dark:border-gray-700">Student</th>
                    <th class="p-2 border dark:border-gray-700">Program</th>
                    <th class="p-2 border dark:border-gray-700">Department</th>
                    <th class="p-2 border dark:border-gray-700">Download</th>
                    <th class="p-2 border dark:border-gray-700">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $index => $application)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-2 border dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $index + 1 }}</td>
                    <td class="p-2 border dark:border-gray-700 text-gray-800 dark:text-gray-100">{{
                        $application->user->name }}</td>
                    <td class="p-2 border dark:border-gray-700 text-gray-800 dark:text-gray-100">{{
                        $application->program->name ?? '-' }}</td>
                    <td class="p-2 border dark:border-gray-700 text-gray-800 dark:text-gray-100">
                        @if($application->program && $application->program->department)
                        {{ $application->program->department->name }}
                        @else
                        -
                        @endif
                    </td>
                    <td class="p-2 border dark:border-gray-700">
                        @if(!$application->downloaded)
                        <button wire:click="download({{ $application->id }})"
                            class="text-blue-600 dark:text-blue-400 hover:underline">Download</button>
                        @else
                        <span class="text-green-600 dark:text-green-400 font-semibold">✔ Downloaded</span>
                        @endif
                    </td>
                    <td class="p-2 border dark:border-gray-700">
                        <span
                            class="px-2 py-1 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 text-xs">
                            Accepted
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500 dark:text-gray-400 dark:bg-gray-800">No
                        accepted applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
