<div class="grid grid-cols-1 gap-4">
    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
    <p><strong>Name:</strong> {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>DOB:</strong> {{ $student->dob?->format('Y-m-d') }}</p>
    <p><strong>Gender:</strong> {{ $student->gender }}</p>
    <p><strong>Grade:</strong> {{ $student->grade }}</p>
    <p><strong>Parent/Guardian:</strong> {{ $student->parent_name }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    <p><strong>Medical Condition / Allergies:</strong> {{ $student->medical_condition ?? '-' }}</p>
    <p><strong>Performance & Expectations:</strong> {{ $student->performance }}</p>
    <p><strong>Schedule:</strong></p>
    <ul>
        <li>Monday: {{ $student->schedule['Monday'] ?? '-' }}</li>
        <li>Tuesday: {{ $student->schedule['Tuesday'] ?? '-' }}</li>
        <li>Wednesday: {{ $student->schedule['Wednesday'] ?? '-' }}</li>
        <li>Thursday: {{ $student->schedule['Thursday'] ?? '-' }}</li>
        <li>Friday: {{ $student->schedule['Friday'] ?? '-' }}</li>
        <li>Saturday: {{ $student->schedule['Saturday'] ?? '-' }}</li>
    </ul>
    <p><strong>Note:</strong> {{ $student->note ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $student->status ? 'Enabled' : 'Disabled' }}</p>
    @if($student->image)
        <p><strong>Photo:</strong><br><img src="{{ asset('storage/' . $student->image) }}" class="rounded h-24"></p>
    @endif
    @if($student->document)
        <p><strong>Document:</strong> <a href="{{ asset('storage/' . $student->document) }}" target="_blank">View</a></p>
    @endif
</div>