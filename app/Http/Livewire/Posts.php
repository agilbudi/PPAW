<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{

    public $posts, $iduser, $status, $title, $body;
    public $isModal;

    public function render() 
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.posts')->with('posts', $posts); 
    }

    public function create(){
        $this->resetFields();
        $this->showModal();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'iduser' => 'required',
            'editor' => 'required'//text
        ]);

        //create posts
        $posts= new Post;
        $posts->title= $request->input('title');
        $posts->body= $request->input('editor');//text
        $posts->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('post', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit')->with('post', $posts);
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

        return redirect('/posts')->with('success','Post Updated');
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
        return redirect('/posts')->with('success','Post Deleted');
    }

    //for image upload CKEditor 4
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
