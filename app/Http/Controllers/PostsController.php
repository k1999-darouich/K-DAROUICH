<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Helper\Table;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $users = auth()->user()->profile()->pluck('user_id');

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create(){
        $categories=Categorie::all();
        $types=Type::all();
        return view('posts.create',compact('categories','types'));//or return view('posts.create');
    }
    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
            'intitule'=>'required',
            'type_id'=>'required',
            'du'=>'required',
            'au'=>'required',
            'categorie_id'=>'required',
            'description'=>'required',
        ]);

        $imagePath=request('image')->store('uploads', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'intitule'=>$data['intitule'],
            'type_id'=>$data['type_id'],
            'du'=>$data['du'],
            'au'=>$data['au'],
            'description'=>$data['description'],
            'categorie_id'=>$data['categorie_id'],
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){
        
        //$=DB::table('posts')->where('categorie','=',$post->categorie)->take(4)->get();
        $Semilarposts= Post::where('categorie_id','=',$post->categorie_id)->take(5)->get();
        return view('posts.show', [
            'post' =>$post,
            'Semilarposts'=>$Semilarposts,
        ]);
    }
    public function edit(\App\Post $post)
    {
        
        $categories=Categorie::all();
        $types=Type::all();
        return view('posts.edit',compact('categories','types','post'));
    }

    public function update(\App\Post $post)
    {
        
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
            'intitule'=>'required',
            'type_id'=>'required',
            'du'=>'required',
            'au'=>'required',
            'categorie_id'=>'required',
            'description'=>'required',
        ]);
    
        if(request('image')){
            $imagePath=request('image')->store('uploads', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200,1200);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->posts()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/p/' . $post->id);
    }
    public function destroy(\App\Post $post){

        $post->delete();
        
        
        return redirect()->action([ProfilesController::class, 'index'],[auth()->user()->id]);
    }

}
