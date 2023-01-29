<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-gray-400" x-description="Heroicon name: outline/scale"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                        </path>
                    </svg>
                </div>
                <div class="flex-1 w-0 ml-5">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Users
                        </dt>
                        <dd>
                            <div class="text-lg font-medium text-gray-900">
                                {{ $count }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="px-5 py-3 bg-gray-50">
            <div class="text-sm">
                <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">
                    View all
                </a>
            </div>
        </div>
    </div>
</div>
