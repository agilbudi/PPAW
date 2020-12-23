{{-- <div class="antialiased text-gray-900 md:w-full sm:w-full rounded-lg shadow-lg bg-white my-3">

<form>
    <div class="mx-4 card bg-white max-w-md p-10 md:w-full sm:w-full my-3">
        <div class="title">
            <h1 class="font-bold text-center">Buat Post Baru</h1>
        </div>

            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Judul Post</label>
                    <input name="title" wire:model="title" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Masukan judul postingan"> 
                </div>
            
               <div class="text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mb-2">Isi Postingan</label>
                   <textarea name="editor" wire:model="editor" class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"  placeholder="Masukan isi postingan"></textarea>
               </div>
            </div>

            <!--Tambahin CKEditor upload gambar-->
            <script src="ckeditor/ckeditor.js"></script>
            <script type="text/javascript">
                $(document).ready(function (){
                    $('.editor').ckeditor();
                });
            </script>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click.prevent="store()" name="submit" type="button" value="1" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Submit</button>
                </span>

                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click.prevent="store()" name="status" type="button" value="0" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-gray-700 mt-8 text-center font-semibold focus:outline-none ">Draft</button>
                </span>

                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click="hideModal()" type="status" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-red-700 mt-8 text-center font-semibold focus:outline-none ">Cancel</button>
                </span>
            </div>
    </div>
</form>
</div> --}}

<!-- Warning Modal -->
{{-- <div class="md:w-full sm:w-full rounded-lg shadow-lg bg-white my-3">
    <div class="flex justify-between border-b border-gray-100 px-5 py-4">
          <div>
          <i class="fa fa-exclamation-circle text-green-500"></i>
          <span class="font-bold text-gray-700 text-lg">Posts</span>
          </div>
          <div>
          <button><i class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"></i></button>
          </div>
      </div>
  
    <form>
      <div class="px-10 py-5 text-gray-600">
            <div class="mx-4 card bg-white p-10 my-8">
                <div class="title">
                    <h1 class="font-bold text-center">Buat Post Baru</h1>
                </div>
        
                    <div class="form mt-4">
                        <div class="flex flex-col text-sm">
                            <label for="title" class="font-bold mb-2">Judul Post</label>
                            <input name="title" wire:model="title" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Masukan judul postingan"> 
                        </div>
                    
                       <div class="text-sm flex flex-col">
                        <label for="description" class="font-bold mt-4 mb-2">Isi Postingan</label>
                           <textarea name="editor" wire:model="editor" class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"  placeholder="Masukan isi postingan"></textarea>
                       </div>
                    </div>
        
                    <!--Tambahin CKEditor upload gambar-->
                    <script src="ckeditor/ckeditor.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function (){
                            $('.editor').ckeditor();
                        });
                    </script>
        
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" name="status" type="button" value="0" class="w-full rounded-full bg-blue-600 shadow-lg text-white px-5 py-2 hover:bg-gray-600 mt-8 text-center font-semibold focus:outline-none ">Draft</button>
                        </span>
                    </div>
            </div>
      </div>
      <div class="px-5 py-4 flex justify-end">
      <button wire:click="hideModal()" type="status" class="bg-blue-600 mr-1 rounded text-sm px-4 py-2 text-white hover:bg-red-700 transition duration-400 ease-in-out transform hover:-translate-x-1 hover:scale-105">Batal</button>
      <button wire:click.prevent="store()" name="submit" type="button" value="1" class=" bg-blue-600 hover:bg-blue-800 text-sm py-2 px-4 text-gray-700 hover:text-white transition duration-400 ease-in-out transform hover:-translate-y-1 hover:scale-105">Submit</button>
      </div>
  
    </form>
</div> --}}
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form id="post-create">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="formTitle" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formTitle" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formBody"  class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                            <input type="text" value="{{$iduser}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formBody" wire:model="body">
                            @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formIdUser" class="block text-gray-700 text-sm font-bold mb-2"></label>
                            <input type="hidden" value="{{$iduser}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formIdUser" wire:model="iduser">
                            @error('iduser') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
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