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
        <h1 class="text-xl font-semibold text-gray-900">Transactions</h1>
        <p class="mt-2 text-sm text-gray-700">A table of placeholder stock market data that does not make any sense.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export</button>
      </div>
    </div>
    <div class="flex flex-col mt-8">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Transaction ID</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Company</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Share</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Commision</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                  <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Net amount</th>
                  <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">AAPS0L</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Chase &amp; Co.</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">CAC</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$4.37</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$3,509.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">12.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$4,397.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">O2KMND</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Amazon.com Inc.</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">AMZN</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$5.92</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$2,900.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">8.80</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$3,509.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, O2KMND</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">1LP2P4</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Procter &amp; Gamble</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">PG</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">-$5.65</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$7,978.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">2.30</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$2,652.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, 1LP2P4</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">PS9FJGL</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Berkshire Hathaway</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">BRK</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$4.37</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$3,116.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">48.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$6,055.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, PS9FJGL</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">QYR135</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Apple Inc.</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">AAPL</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$38.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$8,508.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">36.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$3,496.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, QYR135</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">99SLSM</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">NVIDIA Corporation</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">NVDA</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$1,427.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$4,425.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">18.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$2,109.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, 99SLSM</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">OSDJLS</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">Johnson &amp; Johnson</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">JNJ</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">+$1,937.23</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$4,038.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">32.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$7,210.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, OSDJLS</span></a>
                    </td>
                  </tr>

                  <tr>
                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">4HJK3N</td>
                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">JPMorgan</td>
                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">JPM</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">-$3.67</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$3,966.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">80.00</td>
                    <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">$6,432.00</td>
                    <td class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, 4HJK3N</span></a>
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
