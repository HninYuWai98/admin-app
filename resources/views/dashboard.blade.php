@extends('layouts.app')

@section('content')

{{-- <x-app-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}



{{-- </x-app-layout> --}}

<section class="content box mt-5">
    <div class="col-10 m-auto card">
        <div class="card-body bg-primary row">
            <div class="col-4 bg-secondary"> col 4</div>
            <div class="col-4 bg-white"> col 4</div>
            <div class="col-4 bg-black"> col 4</div>
            <div class="col-4">another col 4</div>

        </div>
    </div>
</section>
@endsection
