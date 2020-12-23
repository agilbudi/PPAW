    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    @endsection
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Post</button>
                
                @if($isModal)
                    @include('livewire.createpost')
                @elseif($isModalE)
                    @include('livewire.editpost')
                @endif
    
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Judul</th>
                            {{-- <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Telp</th> --}}
                            <th class="px-4 py-2 w-20">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="border px-4 py-2"><a href='/posts/{{$post->id}}'>{{ $post->title }}</a></td>
                                {{-- <td class="border px-4 py-2">{{ $row->email }}</td>
                                <td class="border px-4 py-2">{{ $row->phone_number }}</td> --}}
                                <td class="border px-4 py-2">
                                    @if($post->status==0)
                                        Draft
                                    @else
                                        Public
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button wire:click="destroy({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 