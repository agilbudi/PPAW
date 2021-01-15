<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;


class Posts extends Component
{
    use WithFileUploads;

    public $posts, $iduser, $status, $title, $body, $image, $pathFile, $passValue;
    public $isModal = 0, $isModalE = 0;

    public function render() 
    {
        $user = auth()->user()->id; 
        $this->posts = Post::where('iduser',"$user")->orderBy('id','ASC')->get();
        return view('dashboard'); 
    }

    public function create(){
        $this->resetFields();
        $this->showModal();
        $this->iduser = Auth::id();
        return view('livewire.createpost')->with('iduser', $this->iduser);
    }
    
    public function showModal(){
        $this->isModal = true;
    }

    public function hideModal(){
        $this->isModal = false;
    }

    public function showModalE(){
        $this->isModalE = true;
    }

    public function hideModalE(){
        $this->isModalE = false;
    }

    public function resetFields(){
        $this->iduser=Auth::id();
        $this->status='';
        $this->title='';
        $this->body='';
        $this->passValue='';
        $this->pathFile='';
    }

    /**
     * Menampilkan home
     */
    public function home()
    {
        $join = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.iduser')
        ->select('posts.*', 'users.name')
        ->where('posts.status', '1')
        ->orderBy('created_at', 'DESC')
        ->paginate(6);

        $data =[
            'join' => $join
        ];
        return view('home')->with($data); 
    }
    /**
     * Show Individual Post
     */
    public function show($idpost){
        $user = auth()->user()->id; 
        $post = Post::find($idpost);
        $data =[
            'post' => $post,
            'user' => $user
        ];
        return view('livewire.posts')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', // 1MB Max
        ]);

        $namaFile = 'image_'.time();
        $this->pathFile = '/storage/image/'.$namaFile;

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'iduser' => $this->iduser,
            'status' => $this->status,
            'image' => $this->pathFile
        ]);
            
        $validatedata['image'] = $this->image->storeAs('image', $namaFile, 'public');
        

        request()->session()->flash(
            'success',
            'Post telah dibuat'
        );
        return redirect()->route('dashboard');

        $this->hideModal();
        $this->resetFields();
    }

    public function update(){

        Post::updateOrCreate(['id' => $this->passValue], [
            'title' => $this->title,
            'body' => $this->body,
            'iduser' => $this->iduser,
            'status' => $this->status,
        ]);
        // $posts->save();

        request()->session()->flash(
            'success',
            'Post telah dibuat'
        );
        return redirect()->route('dashboard');

        $this->hideModalE();
        $this->resetFields();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function edit($id)
    {
        $posts = Post::find($id); 
        $this->title = $posts->title;
        $this->body = $posts->body;
        $this->status = $posts->status;
        $this->iduser = $posts->iduser;

        $this->passValue = $posts->id;
        $this->showModalE(); 
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
