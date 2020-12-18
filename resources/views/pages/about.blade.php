<x-app-layout>
    <x-slot name="header">
        <div class="bg-white">
        <img class="float-left h-auto w-7 mr-2 rounded-full" src="https://firebasestorage.googleapis.com/v0/b/project-dummy-by-hide.appspot.com/o/other%2Flogo%20b-01.png?alt=media&token=c6e613cd-f0b7-43c0-aec0-51134ec408ee" alt="FAL" />
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About FAL') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
         @include('body.about')  <!--disini includ-tan dari views/body -->
         <!--jadi disini tidak terlalu banyak kode semua isi ada di folder body -->
         <!--gmana mnurutmu ribet gk? jd bingung gak? -->
    </x-slot>
</x-app-layout>