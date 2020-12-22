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
<div class="md:w-full sm:w-full rounded-lg shadow-lg bg-white my-3">
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
</div>