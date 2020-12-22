    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    @endsection
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10">
                <button wire:click="create()" class="cursor-pointer py-2 px-4 rounded transition duration-500 ease-in-out bg-green-300 hover:bg-blue-500 transform hover:-translate-y-1 hover:scale-110">
                    Buat Post Baru
                </button>
                    
                <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg mt-5 px-10 py-10">
                    @if ($isModal)
                        @include('livewire.createpost')
                    @endif
                    @if ($posts)
                        <div class="shadow bg-white">
                            <div class=" bg-size bg-cover bg-center"
                                style="background-image: url('')">
                                <div class="p-4 h-32 flex items-end text-white">
                                    <h3 class="mb-2">{{ '$item->title' }}</h3>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-grey-600 text-sm">
                                {{ 'substr($item["body"],0,100)' }}
                                </p>
                                <div class="mt-4">
                                    <button class="bg-white text-black px-6 py-3 rounded hover:bg-green-200">
                                        Show
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <button wire:click="update({{'$item->id'}})" class="bg-blue-400 text-black px-6 py-3 rounded hover:bg-blue-600">
                                        Edit
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <button wire:click="destroy({{'$item->id'}})" class="bg-red-400 text-black px-6 py-3 rounded hover:bg-red-600">
                                        Deleted
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <h1> Tidak ada Artikel</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

 