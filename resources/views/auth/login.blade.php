<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-semibold tracking-tight">Welcome Back</h2>
        <p class="text-sm text-gray-500 font-light mt-2">Log in to access your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-semibold tracking-wider uppercase text-gray-700 mb-2">{{ __('Email') }}</label>
            <input id="email" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password" class="block text-xs font-semibold tracking-wider uppercase text-gray-700 mb-2">{{ __('Password') }}</label>
            <input id="password" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-3"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-[4px] border-gray-300 text-black shadow-sm focus:ring-black" name="remember">
                <span class="ms-2 text-sm text-gray-600 font-light">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-500 font-light hover:text-black underline underline-offset-4 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full bg-black text-white font-semibold text-xs tracking-widest uppercase py-4 rounded-[4px] hover:bg-gray-800 transition-colors">
                {{ __('Log in') }}
            </button>
        </div>
        
        <div class="mt-6 text-center">
             <p class="text-sm font-light text-gray-600">Don't have an account? 
                <a href="{{ route('register') }}" class="font-medium text-black hover:underline underline-offset-4">Register here</a>
             </p>
        </div>
    </form>
</x-guest-layout>
