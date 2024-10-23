<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="." class="p-1.5 font-black text-3xl text-white font-mono">
             strikewak.jeger
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 font-mono">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4 font-mono" />

        <form method="POST" action="{{ route('password.email') }}" class="font-mono">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
