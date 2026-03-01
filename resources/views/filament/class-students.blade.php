<!DOCTYPE html>
<html>
<head>
    <title>Students - {{ $classSession->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

<h2 class="text-3xl font-bold mb-6">
    Students - {{ $classSession->title }}
</h2>

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 border">ID</th>
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr class="hover:bg-gray-100 even:bg-gray-50">
                    <td class="p-3 border">{{ $student->student_id }}</td>
                    <td class="p-3 border font-medium">{{ $student->full_name }}</td>
                    <td class="p-3 border">{{ $student->email }}</td>
                </tr>
            @empty
                <tr>
                    <td class="p-3 border text-center" colspan="3">No students found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>