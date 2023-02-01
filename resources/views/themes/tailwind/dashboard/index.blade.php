@extends('theme::layouts.app')


@section('content')
    <div class="px-8 mx-auto my-6 max-w-7xl sm:px-6 lg:px-8 xl:px-5">
        <div class="grid grid-cols-1 gap-5 mt-2 sm:grid-cols-4 lg:grid-cols-4">
            <!-- Card -->

            @livewire('card.wallet-card')

            @livewire('card.user-card')

            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-400" x-description="Heroicon name: outline/refresh"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Pending Withdrawals
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        $0.00
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

            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-400" x-description="Heroicon name: outline/check-circle"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Debit/Credit (last 30 days)
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        $0.00
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
    </div>

    {{-- <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div
            class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
            <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
                <div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
                    <svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="relative flex-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Welcome to your Dashboard
                    </h3>
                    <p class="text-sm leading-5 text-gray-500 mt">
                        Manage your Rimplenet app
                    </p>
                </div>

            </div>
            <div class="relative p-5">
                <p class="text-base leading-loose text-gray-500">You can use your <a
                        href="{{ route('wave.settings', ['section' => 'api']) }}" class="underline text-wave-500">API
                        Key</a>
                    to authorize your application's interaction with rimplenet. </p>
                <br><br>Click on the button below to create test wallet.</p>
                <span class="inline-flex mt-5 rounded-md shadow-sm">
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
                        Create Demo Wallet (Coming soon)
                    </a>
                </span>
            </div>
        </div>
        <div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg lg:ml-3 border-gray-150">
            <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
                <div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
                    <svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                        </path>
                    </svg>
                </div>
                <div class="relative flex-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Learn more about Rimplenet
                    </h3>
                    <p class="text-sm leading-5 text-gray-500 mt">
                        Get up and running fast
                    </p>
                </div>

            </div>
            <div class="relative p-5">
                <p class="text-base leading-loose text-gray-500">Make sure to head on over to the Rimplenet API Docs to
                    learn more how to use it.<br><br>Click on the button below to checkout the API tutorials.</p>
                <span class="inline-flex mt-5 rounded-md shadow-sm">
                    <a href="https://nellalink.gitbook.io/rimplenet" target="_blank"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
                        View Tutorials
                    </a>
                </span>
            </div>
        </div>

    </div> --}}

    <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg border-gray-150">
            <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
                <div class="relative flex-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Wallets
                    </h3>
                </div>

            </div>
            <livewire:wallet-component />
        </div>

    </div>

    <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg border-gray-150">
            <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
                <div class="relative flex-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Transactions
                    </h3>
                </div>

            </div>
            <div class="py-16">
                <div class="text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No transactions</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Transactions created in your app will be created here.
                    </p>
                    <div class="mt-6">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-wave-500 hover:bg-wave-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-5 h-5 mr-2 -ml-1" x-description="Heroicon name: solid/plus"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Create Test Transaction
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg border-gray-150">
            <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
                <div class="relative flex-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Users
                    </h3>
                </div>

            </div>
            @livewire('user-component')
        </div>

    </div>
@endsection
