<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    @endsection
    {{$post->title}}
    <br>
    {{$post->body}}
</x-app-layout>