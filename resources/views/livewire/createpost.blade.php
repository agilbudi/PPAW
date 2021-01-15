<style>
    textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        resize: none;
    }
</style>
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        {{-- <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"> --}}
        <div class="inline-block overflow-hidden transform bg-white text-left shadow-xl trasition-all md:my-8 md:align-middle md:w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form id="post-create" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 ">
                {{-- <div class="bg-white w-screen"> --}}
                    <div class="">
                        <div class="mb-4">
                        {{-- <div> --}}
                            <label for="formTitle" class="block text-gray-700 text-sm font-bold mb-2 ">Title:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formTitle" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4 text-left">
                        {{-- <div> --}}
                            <label for="formBody"  class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:h-48 textarea" id="formBody" wire:model="body"></textarea>
                            @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                        {{-- <div> --}}
                            <label for="formIdUser" class="block text-gray-700 text-sm font-bold mb-2"></label>
                            <input type="hidden" value="{{$iduser}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formIdUser" wire:model="iduser">
                            @error('iduser') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="overflow-hidden relative w-64 mt-4 mb-4">
                        {{-- <div class="overflow-hidden"> --}}
                            <label class="w-40 flex flex-col items-center px-1 py-2 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-800 hover:text-white">
                                {{-- <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg> --}}
                                <span class="mt-1 text-base leading-normal">Select a file</span>
                                <input type='file' class="hidden" name="image" wire:model="image"/>
                            </label>
                        </div>
                        <div class="mb-4">
                        {{-- <div> --}}
                            <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select class="form-control" wire:model="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
    
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" name="status" form="post-create" type="button" value='1' class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:model="status">
                        Simpan
                        </button>
                    </span>
                    {{-- <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" name="status" form="post-create" type="button" value='0' class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:model="status">
                        Simpan sebagai Draft
                        </button>
                    </span> --}}
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        
                        <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>