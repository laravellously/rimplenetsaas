@extends('theme::layouts.app')

@section('content')
    <!--
      This example requires Tailwind CSS v2.0+

      The alpine.js code is *NOT* production ready and is included to preview
      possible interactivity
    -->
    <div class="py-10 bg-gray-100">
        <div class="mx-auto max-w-7xl">

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,
                            title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                            user</button>
                    </div>
                </div>
                @livewire('user-component')
            </div>

        </div>
    </div>
@endsection
