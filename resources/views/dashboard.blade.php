<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <!-- Cards Section -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>

        <!-- Application Instructions Section -->
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Application Guidelines & Requirements</h2>

            <ul class="list-disc pl-6 space-y-2 text-gray-700 dark:text-neutral-200">
                <li>Fill in all required personal information accurately.</li>
                <li>Ensure you upload a clear copy of your certificate, national ID, and a recent personal photo.</li>
                <li>The uploaded files must be in image format (JPG, PNG) and should not exceed 2MB.</li>
                <li>Select the desired program from the list. You can only apply to one program.</li>
                <li>Double-check your email and phone number for accuracy – we will use them to contact you.</li>
                <li>Once submitted, you cannot edit the application. Please make sure all data is correct.</li>
                <li>You can track the status of your application via the sidebar after submission.</li>
                <li>If you have any issues, please contact support via the university portal.</li>
            </ul>
        </div>
    </div>
</x-layouts.app>