<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    @endsection
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10">
                {{-- <button wire:click="create()" class="cursor-pointer py-2 px-4 rounded transition duration-500 ease-in-out bg-green-300 hover:bg-blue-500 transform hover:-translate-y-1 hover:scale-110">
                    Buat Post Baru
                </button> --}}
                <button class="cursor-pointer py-2 px-4 rounded transition duration-500 ease-in-out bg-green-300 hover:bg-blue-500 transform hover:-translate-y-1 hover:scale-110"><a href="/posts/create">Buat Post Baru</a></button>
                    
                <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg mt-5 px-10 py-10">
                    @if ($isModal)
                        {{route('posts.create')}}
                    @endif
                    @if ($hitung > 0)
                        @foreach ($posts as $post)
                            {{-- <div class="shadow bg-white">
                                <div class=" bg-size bg-cover bg-center"
                                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/7/71/Black.png')">
                                    <div class="p-4 h-32 flex items-end text-white">
                                        <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <p class="text-grey-600 text-sm">
                                    {{ substr($post["body"],0,100) }}
                                    </p>
                                    <div class="mt-4">
                                        <button class="bg-white text-black px-6 py-3 rounded hover:bg-green-200">
                                            Show
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <button wire:click="update({{$post->id}})" class="bg-blue-400 text-black px-6 py-3 rounded hover:bg-blue-600">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <button wire:click="destroy({{$post->id}})" class="bg-red-400 text-black px-6 py-3 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="shadow bg-white p-12">
                            
                                <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                                <button data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('posts.destroy', $post->id) }}" title="Delete Project">
                                    delete
                                </button>
                            </div><br/>
                        @endforeach
                        {{$posts->links()}}
                    @else
                        <h1> Tidak ada Artikel</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 