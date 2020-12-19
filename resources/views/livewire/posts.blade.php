<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10">
                <div class="container">   
                    
                    <!--Create data-->
                    <button wire:click="create()" class="bg-blue-400 text-white px-6 py-3 rounded hover:bg-blue-600">
                        @if ($isModal)
                            @include('livewire.createpost')
                        @endif
                        Buat Post Baru
                    </button>

                    <!--isi page post-->
                    <div class="bg-white p-6 border border-gray-600 flex justify-between items-center mt-3">
                        @if (count($posts)>0)
                            @if ($posts['status']==1)
                                @foreach ($posts as $item)
                                    <div class="shadow bg-white">
                                        <div class=" bg-size bg-cover bg-center"
                                            style="background-image: url('')">
                                            <div class="p-4 h-32 flex items-end text-white">
                                                <h3 class="mb-2">{{ $item->title }}</h3>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <p class="text-grey-600 text-sm">
                                            {{ substr($item['body'],0,100) }}
                                            </p>
                                            <div class="mt-4">
                                                <button class="bg-white text-black px-6 py-3 rounded hover:bg-green-200">
                                                    Show
                                                </button>
                                            </div>
                                            <div class="mt-4">
                                                <button wire:click="update({{$item->id}})" class="bg-blue-400 text-black px-6 py-3 rounded hover:bg-blue-600">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="mt-4">
                                                <button wire:click="destroy({{$item->id}})" class="bg-red-400 text-black px-6 py-3 rounded hover:bg-red-600">
                                                    Deleted
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        {{$posts->link()}}
                        @else
                            <h1> Tidak ada Artikel</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>