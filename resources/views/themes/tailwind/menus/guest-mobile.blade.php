<div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out scale-100" x-transition:enter-start="opacity-50 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-75 ease-in scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="absolute inset-x-0 top-0 transition origin-top transform md:hidden">
    <div class="shadow-lg">
        <div class="bg-white divide-y-2 shadow-xs divide-gray-50">
            <div class="px-8 py-6 space-y-6">
                <div class="grid grid-cols-2 row-gap-4 col-gap-8 px-1 pb-4">
                    <a href="/" class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                        Home
                    </a>
                    <a href="/#features" class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                        Features
                    </a>
                    <a href="/#pricing" class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                        Pricing
                    </a>
                </div>
                <div class="space-y-6">
                    <span class="flex w-full rounded-md shadow-sm">
                        <a href="{{ route('register') }}" class="flex items-center justify-center w-full px-4 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">
                            Sign up
                        </a>
                    </span>
                    <p class="text-base font-medium leading-6 text-center text-gray-500">
                        Existing customer?
                        <a href="{{ route('login') }}" class="transition duration-150 ease-in-out text-wave-600 hover:text-wave-500">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
