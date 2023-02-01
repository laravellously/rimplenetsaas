<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <button type="button" wire:click="createTestUser"
                    class="inline-flex items-center px-4 py-2 my-3 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-wave-500 hover:bg-wave-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-5 h-5 mr-2 -ml-1" x-description="Heroicon name: solid/plus"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Create Test User
                </button>
                <div class="mt-3 overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                    @if ($users->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                        Fullname</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Username</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Email</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Created</th>
                                    <th scope="col" class="relative py-3.5 pl-0 pr-4 sm:pr-6 lg:pr-8">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $w)
                                    <tr wire:key="item-{{ $w->id }}">
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6 lg:pl-8">
                                            {{ $w->first_name }} {{ $w->last_name }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $w->username }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $w->user_email }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($w->user_created_at)->diffForHumans() }}</td>
                                        <td
                                            class="relative py-4 pl-0 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6 lg:pr-8">
                                            <button wire:click="deleteUser('{{ $w->id }}')"
                                                class="px-6 bg-white border border-gray-300 rounded-md shadow-sm text-cyan-700 hover:text-cyan-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete<span
                                                    class="sr-only"> @{{ $w - > username }}</span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links('livewire::simple-tailwind') }}
                    @else
                        <div class="py-16 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No users</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Users created in your application will be displayed here.
                            </p>
                            <div class="mt-6">
                                <button type="button" wire:click="createTestUser"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-wave-500 hover:bg-wave-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-5 h-5 mr-2 -ml-1" x-description="Heroicon name: solid/plus"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Create Test User
                                </button>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@section('javascript')

    <script>
        Livewire.on('userDeleted', () => {
            setTimeout(function() {
                popToast("success", "Completed");
            }, 10);
        })

        Livewire.on('userNotCreated', () => {
            setTimeout(function() {
                popToast("danger", "User was NOT created!!");
            }, 5);
        })

    </script>

@endsection
