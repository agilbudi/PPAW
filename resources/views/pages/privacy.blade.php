<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PRIVACY POLICY') }}
        </h2>
    @endsection

    <x-slot name="slot">
        @include('body.privacy')
    </x-slot>
</x-app-layout>