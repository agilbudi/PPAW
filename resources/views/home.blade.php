<x-app-layout>
    {{--headernya--}}
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    @endsection

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="h-screen overflow-hidden flex items-center justify-center">
                    {{-- Menampilkan Post --}}
                    <div class="max-w-2xl w-full lg:flex">
                        {{-- menampilkan gambar --}}
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
                        </div>
                        <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <p class="text-sm text-grey-dark flex items-center"> Aug 18 </p>
                              <div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?</div>
                              <p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                            </div>
                            <div class="flex items-center"> 
                              <div class="text-sm">
                                <button class="mb-3 rounded-full flex items-center shadow bg-blue-500 px-4 py-2 text-white bottom-0 right-0 hover:bg-blue-400">
                                    Show
                                </button>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
