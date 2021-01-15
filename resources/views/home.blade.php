<x-app-layout>
    {{--headernya--}}
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    @endsection

    <div class="py-12">
        <div class="max-w-7xl mx-5 sm:px-3 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 justify-center max-w-7xl p-3 sm:p-5">
                    {{-- Menampilkan Post --}}
                    @forelse ($join as $item)
                        <div class="w-auto sm:w-full lg:flex">
                            <!-- menampilkan gambar -->
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{$item->image}}')" title="Post Image">
                            </div>
                            
                            <div class="overflow-hidden border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <p class="text-sm text-grey-dark flex items-center"> {{$item->created_at}} </p>
                                <div class="text-black font-bold text-xl mb-2"> {{$item->title}} </div>
                                <p class="text-grey-darker text-base"> {{$item->body}} </p>
                                </div>
                                <div class="flex items-center"> 
                                <div class="text-sm">
                                    <a href="/post/{{$item->id}}" class="mb-3 rounded-full flex items-center shadow bg-blue-500 px-4 py-2 text-white bottom-0 right-0 hover:bg-blue-400">
                                        Show
                                    </a>
                                </div>
                                </div>
                                <div class="object-right-bottom">
                                    <small class="text-gray-400"> {{$item->name}} </small>
                                </div>
                            </div>
                        </div>   
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </div>
                <div class="p-3 text-blue-700">{{$join->links()}}</div>
            </div>
        </div>
    </div>
</x-app-layout>
