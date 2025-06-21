<div class="p-6 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- All Applications -->
            <div
                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border-l-4 border-green-500 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">All Applications</h2>
                    <div class="p-1.5 rounded-full bg-green-100 dark:bg-green-900 text-yellow-600 dark:text-yellow-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 16h8M8 12h8M9 20h6a2 2 0 002-2V6a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-800 dark:text-white mt-3">{{ $allCount }}</p>
            </div>

            <!-- Completed -->
            <div
                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border-l-4 border-green-500 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">Completed</h2>
                    <div class="p-1.5 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-800 dark:text-white mt-3">{{ $completedCount }}</p>
            </div>

            <!-- Pending -->
            <div
                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border-l-4 border-yellow-500 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">Pending</h2>
                    <div
                        class="p-1.5 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-800 dark:text-white mt-3">{{ $pendingCount }}</p>
            </div>

            <!-- Incomplete -->
            <div
                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border-l-4 border-red-500 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-gray-700 dark:text-gray-200">Incomplete</h2>
                    <div class="p-1.5 rounded-full bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-800 dark:text-white mt-3">{{ $incompleteCount }}</p>
            </div>

        </div>
    </div>
</div>
