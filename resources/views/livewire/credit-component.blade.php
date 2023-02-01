<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <button type="button" wire:click="createTestCredit"
                    class="inline-flex items-center px-4 py-2 my-3 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-wave-500 hover:bg-wave-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-5 h-5 mr-2 -ml-1" x-description="Heroicon name: solid/plus"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Create Test Credit
                </button>
                <div class="mt-3 overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                    @if ($credits->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        ID</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Type</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Currency</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Amount</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Bal. Before</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Bal. After</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($credits as $w)
                                    <tr wire:key="item-{{ $w->id }}">
                                        <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">
                                            #{{ $w->id }}</td>
                                        <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $w->txn_type }}</td>
                                        <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">
                                            {{ $w->currency }}</td>
                                        <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $w->amount }}</td>
                                        <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $w->total_balance_before }}</td>
                                        <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $w->total_balance_after }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $credits->links('livewire::simple-tailwind') }}
                    @else
                        <div class="py-16 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No credits</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Credit transactions created in your application will be displayed here. To create a test credit transaction, first create a test user, then a test wallet, then send a POST request.
                            </p>
                            <div class="mt-6">
                                <button type="button" wire:click="createTestCredit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-wave-500 hover:bg-wave-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-5 h-5 mr-2 -ml-1" x-description="Heroicon name: solid/plus"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Create Test Credit
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
        Livewire.on('creditCreated', () => {
            setTimeout(function() {
                popToast("success", "Completed");
            }, 10);
        })

        Livewire.on('creditNotCreated', () => {
            setTimeout(function() {
                popToast("success", "Credit was NOT created successfully!");
            }, 5);
        })
    </script>
@endsection
