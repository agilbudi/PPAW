<div class="antialiased text-gray-900 bg-blue-600">

    
    <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Buat Post Baru</h1>
        </div>

            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Judul Post</label>
                    <input name="title" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Masukan judul postingan"> 
                </div>
            
               <div class="text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mb-2">Isi Postingan</label>
                   <textarea name="editor" class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"  placeholder="Masukan isi postingan"></textarea>
               </div>
            </div>

            <!--Tambahin CKEditor upload gambar-->
            <script src="ckeditor/ckeditor.js"></script>
            <script type="text/javascript">
                $(document).ready(function (){
                    $('.editor').ckeditor();
                });
            </script>

            <div class="submit">
                <button type="submit" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Submit</button>
            </div>
    </div>
    

</div>