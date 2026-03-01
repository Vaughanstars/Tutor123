<div class="fi-page-main">

    {{-- Top Cards --}}
    <div class="grid grid-cols-6 md:grid-cols-6 gap-6 w-full">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow p-6 border border-gray-100 dark:border-gray-800">
            <div class="text-gray-500 text-sm">Total Teachers</div>
            <div class="text-4xl font-bold mt-2 text-green-600">{{ $teachers }}</div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow p-6 border border-gray-100 dark:border-gray-800">
            <div class="text-gray-500 text-sm">Total Students</div>
            <div class="text-4xl font-bold mt-2 text-blue-600">{{ $students }}</div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow p-6 border border-gray-100 dark:border-gray-800">
            <div class="text-gray-500 text-sm">Completed Classes</div>
            <div class="text-4xl font-bold mt-2 text-yellow-600">{{ $completedClasses }}</div>
        </div>
    </div>

    {{-- Upcoming Classes Table --}}
    <!-- <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white dark:bg-gray-900 rounded-2xl shadow border border-gray-100 dark:border-gray-800">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="px-4 py-2 text-left">Class Name</th>
                    <th class="px-4 py-2 text-left">Teacher</th>
                    <th class="px-4 py-2 text-left">Start Time</th>
                    <th class="px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($upcomingClasses as $class)
                <tr class="border-b border-gray-100 dark:border-gray-700">
                    <td class="px-4 py-2">{{ $class->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $class->teacher?->full_name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ optional($class->start_time)->format('d M Y, H:i') ?? 'N/A' }}</td>
                    <td class="px-4 py-2 capitalize">{{ $class->status ?? 'N/A' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center text-gray-500">No upcoming classes</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div> -->

</div>