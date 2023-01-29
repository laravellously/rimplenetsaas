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
                <div class="flex flex-col mt-8">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Lindsay Walton</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Front-end
                                                Developer</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                lindsay.walton@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Member</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Lindsay Walton</span></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Courtney Henry</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Designer</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                courtney.henry@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Admin</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Courtney Henry</span></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Tom Cook</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Director, Product
                                                Development</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                tom.cook@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Member</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Tom Cook</span></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Whitney Francis</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Copywriter</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                whitney.francis@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Admin</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Whitney Francis</span></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Leonard Krasner</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Senior Designer
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                leonard.krasner@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Owner</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Leonard Krasner</span></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Floyd Miles</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Principal Designer
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                floy.dmiles@example.com</td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">Member</td>
                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Floyd Miles</span></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
