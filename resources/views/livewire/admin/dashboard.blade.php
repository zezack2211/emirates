<div class="py-6 space-y-6">
    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Students -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-5 border-l-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Students</p>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $studentCount }}</h2>
                </div>
                <div class="text-blue-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14c4.418 0 8-1.79 8-4V7l-8-4-8 4v3c0 2.21 3.582 4 8 4z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14v7m0 0c-2.5 0-4.71-1.28-6-3.22M12 21c2.5 0 4.71-1.28 6-3.22" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Staff -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-5 border-l-4 border-green-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Staff</p>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $staffCount }}</h2>
                </div>
                <div class="text-green-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m6-4a4 4 0 10-8 0 4 4 0 008 0zm6 0a4 4 0 10-8 0 4 4 0 008 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Programs -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-5 border-l-4 border-purple-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Programs</p>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $programCount }}</h2>
                </div>
                <div class="text-purple-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h10M4 18h10" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Departments -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-5 border-l-4 border-yellow-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Departments</p>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $departmentCount }}</h2>
                </div>
                <div class="text-yellow-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 011-1h2a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm6 0a1 1 0 011-1h2a1 1 0 011 1v16a1 1 0 01-1 1h-2a1 1 0 01-1-1V4zm6 0a1 1 0 011-1h2a1 1 0 011 1v16a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                </div>
            </div>
        </div>
