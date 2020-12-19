<div class="antialiased text-gray-900 bg-blue-600">

<form>
    <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
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

</div>