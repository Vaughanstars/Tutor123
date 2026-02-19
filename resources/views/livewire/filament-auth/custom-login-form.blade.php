<div class="w-full max-w-md p-8 bg-white rounded shadow mx-auto">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
    </div>

    <form method="POST" action="{{ route('filament.auth.login') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border rounded">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Login
            </button>
        </div>
    </form>
</div>
