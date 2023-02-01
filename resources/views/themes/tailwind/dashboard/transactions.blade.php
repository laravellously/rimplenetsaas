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
        <h1 class="text-xl font-semibold text-gray-900">{{ Str::ucfirst(request()->route()->uri) }}</h1>
        <p class="mt-2 text-sm text-gray-700">A table of placeholder stock market data that does not make any sense.</p>
      </div>
    </div>
    @switch(request()->route()->uri)
        @case('credits')
            @livewire('credit-component')
            @break

        @case('debits')
            @livewire('debit-component')
            @break

        @default
            @livewire('transfer-component')
    @endswitch
  </div>

    </div>
  </div>
@endsection
