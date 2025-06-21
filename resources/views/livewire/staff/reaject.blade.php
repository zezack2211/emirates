<div class="p-6 bg-white dark:bg-zinc-900 text-gray-800 dark:text-gray-100 min-h-screen">
    <h1 class="text-xl font-bold mb-4">Rejected Applications</h1>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-200 dark:border-zinc-700 bg-white dark:bg-zinc-800">
            <thead class="bg-gray-100 dark:bg-zinc-700 text-left text-gray-700 dark:text-gray-200">
                <tr>
                    <th class="p-2 border dark:border-zinc-600">Id</th>
                    <th class="p-2 border dark:border-zinc-600">Student</th>
                    <th class="p-2 border dark:border-zinc-600">Program</th>
                    <th class="p-2 border dark:border-zinc-600">Department</th>
                    <th class="p-2 border dark:border-zinc-600">Status</th>
                    <th class="p-2 border dark:border-zinc-600">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $index => $application)
                <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                    <td class="p-2 border dark:border-zinc-700">{{ $index + 1 }}</td>
                    <td class="p-2 border dark:border-zinc-700">{{ $application->user->name }}</td>
                    <td class="p-2 border dark:border-zinc-700">{{ $application->program->name ?? '-' }}</td>
                    <td class="p-2 border dark:border-zinc-700">
                        {{ $application->program->department->name ?? '-' }}
                    </td>
                    <td class="p-2 border dark:border-zinc-700">
                        <span
                            class="px-2 py-1 rounded bg-red-100 text-red-800 text-xs dark:bg-red-900 dark:text-red-300">
                            Rejected
                        </span>
                    </td>
                    <td class="p-2 border dark:border-zinc-700">
                        @if(!$application->downloaded)
                        <button wire:click="download({{ $application->id }})"
                            class="text-blue-600 dark:text-blue-400 hover:underline">Download</button>
                        @else
                        <span class="text-green-600 dark:text-green-400 font-semibold">✔ Downloaded</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500 dark:text-gray-400">
                        No rejected applications found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
