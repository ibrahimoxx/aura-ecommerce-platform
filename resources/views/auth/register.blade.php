<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-semibold tracking-tight">Create an Account</h2>
        <p class="text-sm text-gray-500 font-light mt-2">Join us to shop the latest collection</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Name') }}</label>
            <input id="name" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px] text-red-500" />
        </div>
        
        <div class="grid grid-cols-2 gap-4 mt-4">
            <!-- Tel -->
            <div>
               <label for="tel" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Tel') }}</label>
               <input id="tel" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" />
               <x-input-error :messages="$errors->get('tel')" class="mt-2 text-[10px] text-red-500" />
           </div>

           <!-- CIN -->
           <div>
                <label for="CIN" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('CIN') }}</label>
                <input id="CIN" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="text" name="CIN" :value="old('CIN')" required autocomplete="CIN" />
                <x-input-error :messages="$errors->get('CIN')" class="mt-2 text-[10px] text-red-500" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
             <!-- Ville -->
             <div>
                <label for="ville" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Ville') }}</label>
                <input id="ville" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="text" name="ville" :value="old('ville')" required autocomplete="ville" />
                <x-input-error :messages="$errors->get('ville')" class="mt-2 text-[10px] text-red-500" />
            </div>

            <!-- Addresse -->
            <div>
                <label for="address" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Address') }}</label>
                <input id="address" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="text" name="address" :value="old('address')" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2 text-[10px] text-red-500" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Email') }}</label>
            <input id="email" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] text-red-500" />
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <!-- Password -->
            <div>
                <label for="password" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Password') }}</label>
                <input id="password" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-[10px] font-semibold tracking-widest uppercase text-gray-700 mb-2">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="block w-full border-gray-300 rounded-[4px] shadow-sm focus:border-black focus:ring-0 text-sm py-2 px-3"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[10px] text-red-500" />
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full bg-black text-white font-semibold text-xs tracking-widest uppercase py-4 rounded-[4px] hover:bg-gray-800 transition-colors">
                {{ __('Register') }}
            </button>
        </div>
        
        <div class="mt-6 text-center">
             <p class="text-sm font-light text-gray-600">Already registered? 
                <a href="{{ route('login') }}" class="font-medium text-black hover:underline underline-offset-4">Log in here</a>
             </p>
        </div>
    </form>
</x-guest-layout>
