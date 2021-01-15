<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Post'}}
        </h2>
    @endsection
<style>
    td img{
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10">
                <div class="container">   
                    <!--isi page post-->
                    <div class="font-black text-4xl">{{$post->title}}</div>
                    <div class="bg-gray-100 p-6 flex justify-between items-center mt-3">
                        <table class="table-fixed w-full">
                            <tbody>
                                <tr>
                                    <td style="text-align: center"><img src="{{$post->image}}" alt="post\'s-image"> <br/></td>
                                </tr>
                                <tr>
                                    <td>{{$post->body}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>