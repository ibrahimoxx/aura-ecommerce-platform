<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl tracking-tight text-black">
            {{ __('Manage Profile') }}
        </h2>
    </x-slot>

    <div class="pb-24 bg-white mt-8">
        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="p-8 bg-[#fcfbf9] border border-gray-100 rounded-[8px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-[#fcfbf9] border border-gray-100 rounded-[8px]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-[#fcfbf9] border border-gray-100 rounded-[8px]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
