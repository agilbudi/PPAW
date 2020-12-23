<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Posts extends Component
{

    public $posts, $iduser, $status, $title, $body;
    public $isModal = 0;

    public function render() 
    {
        $user = auth()->user()->id; 
        $this->posts = Post::orderBy('created_at', 'DESC')->get();
        // $isModall = $this->isModal;
        // $posts = Post::where('iduser',$user)->paginate(10);
        // $hitung = Post::where('iduser', $user)->count();
        // $data = [
        //     'hitung' => $hitung,
        //     'posts' => $posts,
        //     'isModal' => $isModall
        // ];
        // return view('dashboard')->with($data);
        return view('dashboard'); 
    }

    public function create(){
        $iduser = Auth::id();
        $this->resetFields();
        $this->showModal();
        return view('livewire.createpost')->with('iduser',$iduser);
    }
    
    public function showModal(){
        $this->isModal = true;
    }

    public function hideModal(){
        $this->isModal = false;
    }

    public function resetFields(){
        $this->iduser='';
        $this->status='';
        $this->title='';
        $this->body='';
    }

    /**
     * Show Individual Post
     */
    public function show($id){
        $user = auth()->user()->id; 
        $post = Post::find($id);
        $data =[
            'post' => $post,
            'user' => $user
        ];
        return view('pages.showPost')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'iduser' => 'required',
        //     'editor' => 'required',//text
        //     'status' => 'required'
        // ]);
        
        $userId = Auth::id();

        //create posts
        $posts= new Post;
        $post->iduser = $request->input('iduser');
        $posts->title= $request->input('title');
        $posts->body= $request->input('editor');//text
        //kurang masukan iduser
        $posts->status = $request->input('status');



        $posts->save();

        return redirect('/dashboard')->with('success','Post Created');

        $this->hideModal();
        $this->resetFields();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'editor' => 'required'
        ]);

        //create posts
        $posts= Post::find($id);
        $posts->title= $request->input('title');
        $posts->body= $request->input('editor');
        $posts->save();

        return redirect('/dashboard')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts= Post::find($id);
        $posts->delete();
        request()->session()->flash(
            'success',
            'Post Deleted'
        );
        return redirect()->route('dashboard');
    }

    //for image upload CKEditor 4
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
