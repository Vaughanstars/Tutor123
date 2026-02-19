<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
    {{-- Custom Logo --}}
    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 mb-6">

    {{-- Filament default login form --}}
    <x-filament::auth.login-form />
</div>
